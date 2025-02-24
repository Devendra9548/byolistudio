<?php

namespace App\Http\Controllers;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Razorpay\Api\Utility;



class RazorpayController extends Controller
{
    public function razorpay(Request $req)
    {
      if((session()->has('cusername') || session()->has('cemail')) && session()->has('cpassword'))
      {
      
      $dbs = new Order();
      $dbs->userid = $req->userid;
      $t=time();
      $d=date("Ymd",$t);
      $orderid = $d."".$t;
      $dbs->orderid = $orderid;
      $dbs->firstname = $req->firstname;
      $dbs->lastname = $req->lastname;
      $dbs->email = $req->email;
      $dbs->phonenumber = $req->phone;
      $dbs->address = $req->address;
      $dbs->altaddress = $req->altaddress;
      $dbs->country = $req->country;
      $dbs->state = $req->state;
      $dbs->zip = $req->zip;
      $dbs->paymethod = $req->paymentmethod;
      $dbs->cart = $req->cart;
      $dbs->amount = $req->amount;
      $dbs->status = $req->status;
      $result = $dbs->save();

      $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_KEY_SECRET'));
      $rzpOrder = $api->order->create(
        array('receipt' => 'ORD_'.$dbs->id,
         'amount' => $req->amount*100,
         'currency' => 'INR',
        ));

      $nord = Order::find($dbs->id);
      $nord->rzp_order_id	= $rzpOrder->id;
      $nord->update();
      return response()->json([
        "success"=>true,
        "order_id"=>$dbs->id,
        "amount"=>$req->amount*100,
        "rzp_order"=>$rzpOrder->id
      ]);
    
      if($result){
        session()->pull('cart', null);
        return true;
      }
      else{
        return false;
      }
    }
    else{
      return redirect('/login');
    }
    }

    public function success(Request $req)
    {
         
         $razOrderId = $req->razorpay_order_id;
         $razPaymentId = $req->razorpay_payment_id;
         $signature = $req->razorpay_signature;

         $order = Order::where("rzp_order_id",$razOrderId)->first();
         if($order){
            $order->paystatus = 2;
            $order->payment_id = $razPaymentId;
            $order->signature = $signature;
            $order->update();

            return redirect()->route('login.dashboard');
         }
         else{
            return redirect()->route('cancel');
         }
    }
  

    public function cancel(Request $request)
    {
       $orderId = $request->query('order_id');
    $paymentId = $request->query('payment_id');
    $status = $request->query('status', 'failed'); 
    $signature = $request->query('signature', 'N/A'); 

    if ($orderId) {
        // Update orders table
        DB::table('orders')
            ->where('rzp_order_id', $orderId)
            ->update([
                'payment_id' => $paymentId,
                'PaymentSTS' => $status,
                'signature' => $signature,
                'updated_at' => now()
            ]);

        return view('cancel', compact('orderId', 'status'));
    } else {
        return redirect('/')->with('error', 'Order ID missing!');
    }
    }
    
 public function handleWebhook(Request $request)
{
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    try {
        $webhookSecret = env('RAZORPAY_WEBHOOK_SECRET');
        $signature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent();

        // ✅ Extract event type first
        $data = $request->all();
        $event = $data['event'] ?? null;

        // ✅ Only verify signature for successful payments
        if ($event !== 'payment.failed') {
            if (!$signature) {
                Log::error('Razorpay Webhook Error: Missing X-Razorpay-Signature for event: ' . $event);
                return response()->json(['error' => 'Missing signature'], 400);
            }

            // ✅ Verify Webhook Signature for successful payments
            $utility = new Utility();
            $utility->verifyWebhookSignature($payload, $signature, $webhookSecret);
        }

        // ✅ Log the webhook data
        Log::info('Razorpay Webhook Verified:', $data);

        // ✅ Extract payment details
        $paymentId = $data['payload']['payment']['entity']['id'] ?? null;
        $orderId = $data['payload']['payment']['entity']['order_id'] ?? null;
        $amount = isset($data['payload']['payment']['entity']['amount']) ? $data['payload']['payment']['entity']['amount'] / 100 : 0;
        $failureReason = $data['payload']['payment']['entity']['error_description'] ?? 'Unknown reason';

        // ✅ Match Razorpay Order ID with your database
        $order = Order::where('rzp_order_id', $orderId)->first();
        if (!$order) {
            Log::error("Order with Razorpay Order ID {$orderId} not found.");
            return response()->json(['error' => 'Order not found'], 404);
        }

        // ✅ Process Events
        switch ($event) {
            case 'payment.captured':
                $order->update([
                    'PaymentSTS' => 'paid',
                    'payment_id' => $paymentId,
                    'amount' => $amount,
                    'signature' => $signature, // Only stored for successful payments
                ]);
                break;

            case 'payment.failed':
                $order->update([
                    'PaymentSTS' => 'failed',
                    'payment_id' => $paymentId,
                    'failure_reason' => $failureReason,
                ]);
                break;
        }

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        Log::error('Webhook Verification Failed: ' . $e->getMessage());
        return response()->json(['error' => 'Invalid webhook signature'], 400);
    }
}


    


}
