<?php

namespace App\Http\Controllers;
use App\Models\AdminInfo;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSeo;
use App\Models\GlobalSeo;
use App\Models\category_blog_seo;
use App\Models\PageSeo;
use App\Models\Product;
use App\Models\Contact;
use App\Models\ProductCategory;
use App\Models\customer;
use App\Models\ProductReview;
use App\Models\HomePage;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ContactMail;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class frontendController extends Controller
{

   function dummy(){
      return view("dummy");
   }

   function websecure(){
    return view("websecure");
   }


   function destroy(){
     session()->flush();
     return redirect('websecure');
   }

   function working(){
    if(session()->get('userid') == 'admin@9548'){
    return view("working");
    }
    else{
        return redirect("/safty");
    }
   }
   function home(){
        $homepage = HomePage::all();
        $pageseo = PageSeo::where('pagename', 'Home')->get();
        $homepageseo = PageSeo::where('pagename', 'Home')->get();
        $gseo = GlobalSeo::find(1);
        $blogs = DB::table('blogs as b')
        ->select('b.id', 'b.title', 'bc.bcname', 'b.description', 'b.file', 'b.slug', 'bc.bcslug')
        ->join('blogs_categories as bc', 'b.category', '=', 'bc.id')
        ->orderBy('b.id', 'desc')
        ->get();

        $products = DB::table('products as p')
        ->select(
            'p.id', 
            'p.p_name', 
            'p.slug', 
            'p.p_price', 
            'p.r_price', 
            'p.category_id', 
            'p.p_image', 
            'p.sizes', 
            'p.description', 
            'pc.category_name',
            DB::raw("(SELECT COUNT(*) FROM product_reviews WHERE product_reviews.productid = p.id) AS review_count"),
            DB::raw("(SELECT COALESCE(AVG(product_reviews.starrating), 0) FROM product_reviews WHERE product_reviews.productid = p.id) AS avg_rating")
        )
        ->join('product_categories as pc', 'p.category_id', '=', 'pc.id')
        ->get();
    

        return view('home', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo,'blogs'=>$blogs,'products'=>$products,'homepage'=>$homepage]);
    }

    function blog(){
        $blogs = Blog::paginate(8);
        $pageseo = PageSeo::where('pagename', 'Blog')->get();
        $homepageseo = PageSeo::where('pagename', 'Blog')->get();
        $gseo = GlobalSeo::find(1);
        return view('blog', ['blogs'=>$blogs,'pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }

    function search(Request $req){
        $result = $req['s'];
        $blog = Blog::where("title", "like", "%" . $result . "%")->get();
        return view('search',['result'=>$result,'blog'=>$blog]);
    }
    
    function contact(){
        $pageseo = PageSeo::where('slug', 'contact-us')->get();
        $homepageseo = PageSeo::where('slug', 'contact-us')->get();
        $gseo = GlobalSeo::find(1);
        return view('contact', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function about(){
        $pageseo = PageSeo::where('slug', 'about')->get();
        $homepageseo = PageSeo::where('slug', 'about')->get();
        $gseo = GlobalSeo::find(1);
        return view('about', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function cancellation(){
        $pageseo = PageSeo::where('slug', 'refund-policy')->get();
        $homepageseo = PageSeo::where('slug', 'refund-policy')->get();
        $gseo = GlobalSeo::find(1);
        return view('refund-policy', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function termsofservice(){
        $pageseo = PageSeo::where('slug', 'terms-of-service')->get();
        $homepageseo = PageSeo::where('slug', 'terms-of-service')->get();
        $gseo = GlobalSeo::find(1);
        return view('terms-of-service', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function privacypolicy(){
        $pageseo = PageSeo::where('slug', 'privacy-policy')->get();
        $homepageseo = PageSeo::where('slug', 'privacy-policy')->get();
        $gseo = GlobalSeo::find(1);
        return view('privacy-policy', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function disclaimer(){
        $pageseo = PageSeo::where('slug', 'shipping-policy')->get();
        $homepageseo = PageSeo::where('slug', 'shipping-policy')->get();
        $gseo = GlobalSeo::find(1);
        return view('shipping-policy', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    function blogcategories(){
        $pageseo = PageSeo::where('pagename', 'Categories')->get();
        $homepageseo = PageSeo::where('pagename', 'Categories')->get();
        $gseo = GlobalSeo::find(1);
        $blogs = BlogCategory::all();
        return view('categories', ['blogs'=>$blogs, 'pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }

    function sendcontact(Request $req){
        $dbs = new Contact();
        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;
        $message = $req->message;

        $dbs->fullname = $name;
        $dbs->email = $email;
        $dbs->phone = $phone;
        $dbs->message = $message;
        $dbs->save();

        $mailData = [
            'name' => $name, 
            'email' => $email, 
            'phone' => $phone,
            'message' => $message,
        ];
          
        Mail::to('devendrasingh991731@gmail.com')->send(new ContactMail($mailData));
        return true;
    }

    function reviewData(Request $req){
        $dbs = new ProductReview();
        $dbs->rusername = $req->rusername;
        $dbs->rpassword = $req->rpassword;
        $dbs->productid = $req->productid;
        $dbs->starrating = $req->starrating;
        $dbs->headline = $req->headline;
        $dbs->preview = $req->preview;

        $origname = '';

        if ($req->hasFile('mediafile'))
        { 
        $file = $req->file('mediafile');
        $mimeType = $file->getClientMimeType();

        if (str_starts_with($mimeType, 'image')) 
        {
        $image = $req->file('mediafile');
        $name = $image->getClientOriginalName();
        $t=time();
        $d=date("Y-m-d",$t);
        $origname = $d."-".$t."-".$name;
        
        $customFolderPath = public_path('review');
        if (!file_exists($customFolderPath)) 
        {
        mkdir($customFolderPath, 0755, true);
        } 
        $image->move($customFolderPath, $origname);

        $imagePath = public_path('review/' . $origname);
        $imagess = Image::make($imagePath);
        $thumbnail = $imagess->resize(244, 300);
        $thumbnailPath = public_path('review-thumb/' . $origname);
        $thumbnail->save($thumbnailPath);
        
        $imagePath = public_path('review/' . $origname);
        $imagess = Image::make($imagePath);
        $thumbnail = $imagess->resize(100, 123);
        $thumbnailPath = public_path('recent-review-thumb/' . $origname);
        $thumbnail->save($thumbnailPath);
  
        $name = $req->file('mediafile')->getClientOriginalName();
        $origname = $d."-".$t."-".$name;
        }
        elseif(str_starts_with($mimeType, 'video')){
            $file = $req->file('mediafile');
            $name = $file->getClientOriginalName();
            $t = time();
            $d = date("Y-m-d", $t);
            $origname = $d . "-" . $t . "-" . $name;
            $customFolderPath = public_path('review');
            $file->move($customFolderPath, $origname);
        } 

        $dbs->mediafile = $origname;

    }

        $dbs->save();


        return true;
    }

    function singleblog($slug){
        $seo = BlogSeo::where('canonical', $slug)->get();
        $blog = Blog::where('slug', $slug)->first();
        $gseo = GlobalSeo::find(1);
        $cblog = DB::table('blogs')
                ->leftJoin('blogs_categories', 'blogs.category', '=', 'blogs_categories.id')
                ->where('blogs_categories.id', $blog->category)
                ->take(6)
                ->get();
         
        $allblogs = Blog::all();
        return view('single-blog',['seo'=>$seo,'blog'=>$blog,'gseo'=>$gseo,'cblog'=>$cblog,'allblogs'=>$allblogs]);
    }

    function singlecategories($slug){
        $seo = category_blog_seo::where('canonical', $slug)->get();
        $blog = BlogCategory::where('bcname', $slug)->first();
        $gseo = GlobalSeo::find(1);

        $cblog = DB::table('blogs as b')
        ->select('b.id', 'b.title', 'bc.bcname', 'bc.created_at', 'bc.updated_at', 'b.description', 'b.file', 'b.slug', 'bc.bcslug')
        ->join('blogs_categories as bc', 'b.category', '=', 'bc.id')
        ->where('bc.bcslug', $slug)
        ->get();


       $allblogs = Blog::all();
        return view('single-category',['seo'=>$seo,'blog'=>$blog,'gseo'=>$gseo,'cblog'=>$cblog,'allblogs'=>$allblogs]);
    }

    function redirectpage($slug){
        $allblogs = Blog::all();
        foreach($allblogs as $allblogs)
        {
            if($slug === $allblogs['slug']){
                return redirect('blog/'.$slug);
             }
         }
      
        
    }

    function singleProduct($slug){
        
        $simproducts = DB::table('products as p')
        ->select('p.id','p.p_name', 'p.slug', 'p.p_price', 'p.r_price', 'p.category_id', 'p.p_image', 'p.sizes', 'p.description', 'pc.category_name')
        ->join('product_categories as pc', 'p.category_id', '=', 'pc.id')
        ->get();

        $product = Product::where('slug', $slug)->first();
        $member = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->where('product_categories.id', $product->category_id)
                ->first();

        $allreviews = ProductReview::all();

        $reviewcal = DB::table('products as p')
        ->select(
            'p.id', 
            'pc.category_name',
            DB::raw("(SELECT COUNT(*) FROM product_reviews WHERE product_reviews.productid = p.id) AS review_count"),
            DB::raw("(SELECT COALESCE(AVG(product_reviews.starrating), 0) FROM product_reviews WHERE product_reviews.productid = p.id) AS avg_rating")
        )
        ->join('product_categories as pc', 'p.category_id', '=', 'pc.id')
        ->get();
        
        $maindecode = $product->p_image;
        $firstdecode = $product->p_image_first;
        $seconddecode = $product->p_image_second;
        $thirddecode = $product->p_image_third;
        $mainimage = json_decode($maindecode);
        $firstimage = json_decode($firstdecode);
        $secondimage = json_decode($seconddecode);
        $thirdimage = json_decode($thirddecode);
        return view('shop.single', ['product'=>$product, 'member'=>$member,'mainimage'=>$mainimage,'firstimage'=>$firstimage,'secondimage'=>$secondimage,'thirdimage'=>$thirdimage,'simproducts'=>$simproducts,'allreviews'=>$allreviews,'reviewcal'=>$reviewcal]);   
    }

    function singleAddProduct(Request $req){
        $product = Product::find($req->pid);
        $image = json_decode($product->p_image);
        $color = $req->color;
        $pid = $req->pid;
        $size = $req->size;
        $catname = $req->catname;
        $cart = session()->get('cart');
       
        if(!$cart){
            $cart = [
                $pid=>[
                    'name'=>$product->p_name,
                    'image'=>$image,
                    'price'=>$product->r_price,
                    'catname'=>$catname,
                    'quantity'=>1,
                    'color'=>$color,
                    'size'=>$size
               ]
            ];
            session()->put('cart', $cart);
            return view('shop.cart-template');
        }

        if(isset($cart[$req->pid])){
          $cart[$req->pid]['quantity']++;
          $cart[$req->pid]['size'] = $size;
          $cart[$req->pid]['color'] = $color;
          session()->put('cart', $cart);
          return view('shop.cart-template');
        }
        
        $cart[$req->pid]=[
                'name'=>$product->p_name,
                'image'=>$image,
                'price'=>$product->r_price,
                'catname'=>$catname,
                'quantity'=>1,
                'color'=>$color,
                'size' => $size
        ];
        session()->put('cart', $cart);
        return view('shop.cart-template');
    }


    function addtocart(){
        return view('add-to-cart');
    }

    function faq(){
        $pageseo = PageSeo::where('slug', 'faq')->get();
        $homepageseo = PageSeo::where('slug', 'faq')->get();
        $gseo = GlobalSeo::find(1);
        return view('faq', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo]);
    }
    

    function Updateaddtocart(Request $req){
      
        $pageseo = PageSeo::where('slug', 'refund-policy')->get();
        $homepageseo = PageSeo::where('slug', 'refund-policy')->get();
        $gseo = GlobalSeo::find(1);
        return $req->quantity;
        
    }

    function Deleteaddtocart($id){
     $cart = session()->get('cart');
     if(isset($cart[$id])){
        unset($cart[$id]);
        session()->put('cart', $cart);
     }
    }

    function shop(Request $req){
        $search = $req['search'] ?? "";
        $orderby = $req['orderby'] ?? "";
        $category = $req['category'] ?? "";
        $pageseo = PageSeo::where('slug', 'shop')->get();
        $homepageseo = PageSeo::where('slug', 'shop')->get();
        $gseo = GlobalSeo::find(1);
        $product = Product::all();
        $productcats = ProductCategory::all();
       
        if($search != ''){
        $member = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select('products.p_name as pname', 'products.p_price as pprice', 'products.r_price as rprice', 'products.p_image as pimages', 'products.p_image_first as pimagefirst', 'products.p_image_second as psecondimage', 'products.p_image_third as pthirdimage', 'products.sizes as sizes', 'products.description as description', 'products.slug as productslug', 'product_categories.slug as category_slug','product_categories.category_name as categoryname','product_categories.image as categoryimage')
                ->where('products.p_name', 'LIKE', '%' . $search . '%')
                ->get();
        }
        else{
            $member = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select('products.p_name as pname', 'products.p_price as pprice', 'products.r_price as rprice', 'products.p_image as pimages', 'products.p_image_first as pimagefirst', 'products.p_image_second as psecondimage', 'products.p_image_third as pthirdimage', 'products.sizes as sizes', 'products.description as description', 'products.slug as productslug', 'product_categories.slug as category_slug','product_categories.category_name as categoryname','product_categories.image as categoryimage')
                ->get();
        }
        if($orderby != ''){
            $member = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select('products.p_name as pname', 'products.p_price as pprice', 'products.r_price as rprice', 'products.p_image as pimages', 'products.p_image_first as pimagefirst', 'products.p_image_second as psecondimage', 'products.p_image_third as pthirdimage', 'products.sizes as sizes', 'products.description as description', 'products.slug as productslug', 'product_categories.slug as category_slug','product_categories.category_name as categoryname','product_categories.image as categoryimage')
                ->orderBy('products.r_price', $orderby)
                ->get();
        }
        if($category != ''){
            $member = DB::table('products')
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select('products.p_name as pname', 'products.p_price as pprice', 'products.r_price as rprice', 'products.p_image as pimages', 'products.p_image_first as pimagefirst', 'products.p_image_second as psecondimage', 'products.p_image_third as pthirdimage', 'products.sizes as sizes', 'products.description as description', 'products.slug as productslug', 'product_categories.slug as category_slug','product_categories.category_name as categoryname','product_categories.image as categoryimage')
                ->where('product_categories.category_name', $category)
                ->get();
        }
        return view('shop', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo,'products'=>$member, 'productcats'=>$productcats]);
    }

    function checkout(){
      if((session()->has('cusername') || session()->has('cemail')) && session()->has('cpassword'))
      {
        $pageseo = PageSeo::where('slug', 'checkout')->get();
        $homepageseo = PageSeo::where('slug', 'checkout')->get();
        $gseo = GlobalSeo::find(1);
        $username = session('cusername');
        $password = session('cpassword');
        $userid = customer::where('username', $username)
        ->where('password', $password)
        ->get();
        $useruniqeid = $userid[0]->id;
        return view('checkout', ['pageseo'=>$pageseo,'gseo'=>$gseo,'homepageseo'=>$homepageseo,'userid'=>$useruniqeid]);
      }
      else{
        return redirect('/login');
      }

    }
  
}