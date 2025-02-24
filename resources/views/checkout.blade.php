<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/assets/css/front/header.css">
    <link rel="stylesheet" href="/assets/css/front/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/front/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <style>
    .needs-validation input,
    .needs-validation .input-group-prepend {
        border: 1px solid #5555554d !important;
    }

    .needs-validation select {
        padding: 6px 8px !important;
        border-radius: 5px !important;
    }

    .razorpay-payment-button {
        background-color: #0d94fb;
        color: white;
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-bottom: 50px;
    }

    .razorpay-payment-button:hover {
        background-color: #0d94fb;
    }
    </style>
</head>

<body>
    <x-header />
    <div class="container">
        <div class="py-5 text-center">

            <h2>Checkout form</h2>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <div class="inner-container" style="position: sticky;top: 130px;">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill" style="color:#000!important">Total Items :
                            <?php
                            try {
                               $cartCount = session('cart') ? count(session('cart')) : 0;
                               echo "<span>{$cartCount}</span>";
                                } 
                            catch (Exception $e) {
                               return redirect()->route('homepage'); 
                            }
                        ?>
                        </span>
                    </h4>
                    <ul class="list-group mb-3">
                        @php
                        $total = 0;
                        $finalproductName='';
                        @endphp
                        @foreach(session('cart') as $id=>$product)
                        <?php
                        $finalproductName .= ($finalproductName ? ', ' : '') . $product['name'];
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product['name'] }}</h6>
                                <small class="text-muted">{{ $product['catname'] }}</small><br>
                                <small class="text-muted">Quantity : {{ $product['quantity'] }}</small>
                            </div>
                            @php
                            $price = $product['price'] * $product['quantity'];
                            @endphp
                            <span class="text-muted text-end">Original Price : {{ $product['price'] }}<br><b> Total :
                                    {{ $price }}</b></span>
                        </li>
                        @php
                        $total = $total + $price;
                        @endphp
                        @endforeach
                        <input type="hidden" id="finalproductName" value="{{$finalproductName}}">
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">Rs.0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span style="margin-top: 8px!important;"><b>Grand Total</b></span>
                            <strong class="text-success fs-3" style="font-weight:400!important">Rs.
                                {{ $total }}</strong>
                        </li>
                    </ul>

                    <form class="card p-2" action="" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form id="purchased" action="" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" value="{{ $userid }}" name="userid">
                    @php
                    $productname=json_encode(session('cart'));
                    @endphp

                    <input type="hidden" value="{{  $productname }}" name="cart">
                    <input type="hidden" value="{{ $total }}" name="amount">
                    <input type="hidden" value="Pending" name="status">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstname" placeholder=""
                                value="" onchange="getpersonalInfo()" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastname" placeholder=""
                                value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" style="background:#ededed" onclick="showmessage()" class="form-control"
                                id="username" placeholder="Username" value="{{session('cusername')}}" readonly required>
                            <div id="showmessage" class="invalid-feedback" style="width: 100%;">
                                Can't be Change the Username.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
                            onchange="getpersonalInfo()">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone Number <span class="text-muted"></span></label>
                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number"
                            onchange="getPhoneNumber()">
                        <div id="phonefailed" class="pt-2 text-danger fw-bold">
                            Please enter a valid Phone Number for shipping updates.
                        </div>
                        <div id="phonesuccess" class="pt-2 text-success fw-bold">
                            Valid Phone Number.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St"
                            required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="altaddress"
                            placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" name="country" required>
                                <optgroup label="Select Country">
                                    <option value="India">India</option>
                                </optgroup>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" name="state" required>
                                <optgroup label="Select State">
                                    <option value="">Select a State</option>
                                    <option value="uttarakhand">Uttarakhand</option>
                                    <option value="uttar_pradesh">Uttar Pradesh</option>
                                    <option value="west_bengal">West Bengal</option>
                                    <option value="maharashtra">Maharashtra</option>
                                    <option value="kerala">Kerala</option>
                                    <option value="karnataka">Karnataka</option>
                                    <option value="telangana">Telangana</option>
                                    <option value="andhra_pradesh">Andhra Pradesh</option>
                                    <option value="tamil_nadu">Tamil Nadu</option>
                                    <option value="odisha">Odisha</option>
                                    <option value="rajasthan">Rajasthan</option>
                                    <option value="madhya_pradesh">Madhya Pradesh</option>
                                    <option value="gujarat">Gujarat</option>
                                    <option value="punjab">Punjab</option>
                                    <option value="haryana">Haryana</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="jammu_and_kashmir">Jammu and Kashmir</option>
                                    <option value="himachal_pradesh">Himachal Pradesh</option>
                                    <option value="bihar">Bihar</option>
                                    <option value="jharkhand">Jharkhand</option>
                                    <option value="chhattisgarh">Chhattisgarh</option>
                                    <option value="assam">Assam</option>
                                    <option value="meghalaya">Meghalaya</option>
                                    <option value="manipur">Manipur</option>
                                    <option value="tripura">Tripura</option>
                                    <option value="arunachal_pradesh">Arunachal Pradesh</option>
                                    <option value="mizoram">Mizoram</option>
                                    <option value="nagaland">Nagaland</option>
                                    <option value="sikkim">Sikkim</option>
                                    <option value="goa">Goa</option>
                                    <option value="lakshadweep">Lakshadweep</option>
                                    <option value="puducherry">Puducherry</option>
                                </optgroup>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <label for="paymentmethod" style="font-weight:500;color:#000;margin-bottom:10px">Select Payment
                        Method</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentmethod" id="flexRadioDefault2"
                            value="Razorpay" onclick="payWithRazorpay()" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Pay With Razorpay
                        </label>
                    </div>
                    <div class="form-check" style="margin-bottom:10px">
                        <input class="form-check-input" type="radio" name="paymentmethod" id="flexRadioDefault1"
                            value="COD" onclick="payWithCOD()">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash On Delivery
                        </label>
                    </div>


                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox"
                        style="display: flex;justify-content: left;align-items: flex-start;">
                        <input type="checkbox" class="custom-control-input position-ll" id="same-address">
                        <label class="custom-control-label" for="same-address"
                            style="color:black;font-weight:500;padding-left:5px">I would like to receive exclusive
                            emails
                            with discounts and product information
                        </label>
                    </div>


                    <p class="py-3">Your personal data will be used to process your order, support your experience
                        throughout
                        this website, and for other purposes described in our privacy policy.</p>
                    <div class="custom-control custom-checkbox"
                        style="display: flex;justify-content: left;align-items: flex-start;">
                        <input type="checkbox" class="custom-control-input position-ll" id="save-info">
                        <label class="custom-control-label" for="save-info"
                            style="color:black;font-weight:500;padding-left:5px">Would you like to be invited to review
                            your
                            order? Check here to receive a message from CusRev (an independent reviews service) with a
                            review form.</label>
                    </div>
                    <hr class="mb-4">
                    <button id="cod-btn" class="btn btn-primary w-100 btn-lg btn-block mb-5 me-2" type="submit">Continue
                        With
                        COD </button>
                    <button id="razorpay-buy" class="btn btn-primary w-100 btn-lg btn-block mb-5 me-2" type="button">

                        Continue with Razorpay<span
                            style="display: block;font-size: 15px;font-weight: bold;color:yellow">Pay Amount: Rs.
                            {{ $total }}</span></button>
                    <div id="razorpay-container">
                    </div>


                </form>
            </div>
        </div>

    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    var uphone = '';
    var ufirstName = '';
    var uemail = '';
    var finalproductName = '';

    function getPhoneNumber() {
        uphone = document.querySelector("#phone").value;
        let regex = /^[6-9]\d{9}$/;
        if (regex.test(uphone)) {
            document.querySelector("#phonesuccess").style.display="block";
            document.querySelector("#phonefailed").style.display="none";
            
        } else {
            document.querySelector("#phonefailed").style.display="block";
            document.querySelector("#phonesuccess").style.display="none";
        }
    }

    function getpersonalInfo() {
        ufirstName = document.querySelector("#firstName").value;
        uemail = document.querySelector("#email").value;
        finalproductName = document.querySelector("#finalproductName").value;
    }
    $(document).ready(function() {
        $("#purchased").submit(function(event) {
            event.preventDefault();

            // Validate all fields
            var isValid = true;
            $("#purchased :input").each(function() {
                var input = $(this);
                if (input.attr("required") && input.val().trim() === "") {
                    isValid = false;
                    alert("All Field are required.");
                    input.focus();
                    return false; // Exit each loop
                }
            });

            if (!isValid) {
                return; // Stop form submission
            }

            // If all fields are valid, proceed with submission
            var form = $("#purchased")[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "/purchased",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res == true) {
                        alert("Purchased successfully!");
                        window.location = "/dashboard";
                    } else {
                        alert("Error! " + res);
                    }
                }
            });
        });
    });
    </script>

    <script>
    function showmessage() {
        document.querySelector("#showmessage").style.display = "block";
    }
    </script>

    <script>
    function payWithRazorpay() {
        document.querySelector("#cod-btn ").style.display = "none";
        document.querySelector("#razorpay-buy ").style.display = "block";
    }

    function payWithCOD() {
        document.querySelector("#cod-btn ").style.display = "block";
        document.querySelector("#razorpay-buy").style.display = "none";
    }
    </script>

    <script>
    $(document).ready(function() {
        $("#razorpay-buy").click(function(event) {
            event.preventDefault();

            // Validate all fields
            var isValid = true;
            $("#purchased :input").each(function() {
                var input = $(this);
                if (input.attr("required") && input.val().trim() === "") {
                    isValid = false;
                    alert("All Field are required.");
                    input.focus();
                    return false; // Exit each loop
                }
            });

            if (!isValid) {
                return; // Stop form submission
            }
            
            var form = $("#purchased")[0];
            var formData = new FormData(form);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "/razorpay",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    RazorPayNow(res.amount, res.rzp_order);
                },
                error: function(xhr, status, error) {
                    alert("AJAX Error: " + error);
                }
            });
        });
    });
    </script>
    <script>
    function RazorPayNow(amount, rzp_order) {
        var options = {
            "key": "{{env('RAZORPAY_KEY')}}",
            "amount": amount,
            "currency": "INR",
            "name": "Byoli Studio",
            "description": finalproductName,
            "image": "https://byolistudio.in/assets/imgs/logo-biyoli.png",
            "order_id": rzp_order,
            "callback_url": "{{route('successpay')}}",
            "prefill": {
                "name": ufirstName,
                "email": uemail,
                "contact": uphone
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response){
        alert(response.error.description);
        // Redirect to cancel page with payment details
        window.location.href = "{{ url('/cancel') }}?order_id=" + rzp_order + "&payment_id=" + response.error.metadata.payment_id + "&status=failed";
     
});
        rzp1.open();
    }
    </script>



    <x-footer facebook="{{ isset($gseo->facebook) ? $gseo->facebook : '' }}"
        linkedin="{{ isset($gseo->linkedin) ? $gseo->linkedin : '' }}"
        instagram="{{ isset($gseo->instagram) ? $gseo->instagram : '' }}"
        twitter="{{ isset($gseo->twitter) ? $gseo->twitter : '' }}"
        youtube="{{ isset($gseo->youtube) ? $gseo->youtube : '' }}"
        mail="{{ isset($gseo->whatsapp) ? $gseo->whatsapp : '' }}" />
</body>

</html>