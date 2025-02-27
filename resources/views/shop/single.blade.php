<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $product->p_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/front/header.css">
    <link rel="stylesheet" href="/assets/css/front/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Jost:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">


    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/front/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/front/single-product.css" />
    <style>
       
        textarea::placeholder {
            color: #0009!important;
            opacity: 1; 
        }
    </style>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
    $('.slideshow-thumbnails').hover(function() {
        changeSlide($(this));
    });

    if ($(window).width() > 468) {

        $(document).mousemove(function(e) {
            var x = e.clientX;
            var y = e.clientY;

            var imgx1 = $('.slideshow-items.active').offset().left;
            var imgx2 = $('.slideshow-items.active').outerWidth() + imgx1;
            var imgy1 = $('.slideshow-items.active').offset().top;
            var imgy2 = $('.slideshow-items.active').outerHeight() + imgy1;

            if (x > imgx1 && x < imgx2 && y > imgy1 && y < imgy2) {
                $('#lens').show();
                $('#result').show();
                imageZoom($('.slideshow-items.active'), $('#result'), $('#lens'));
            } else {
                $('#lens').hide();
                $('#result').hide();
            }
        });

        function imageZoom(img, result, lens) {
            result.width(img.innerWidth());
            result.height(img.innerHeight());
            lens.width(img.innerWidth() / 2);
            lens.height(img.innerHeight() / 2);

            result.offset({
                top: img.offset().top,
                left: img.offset().left + img.outerWidth() + 50
            });

            var cx = img.innerWidth() / lens.innerWidth();
            var cy = img.innerHeight() / lens.innerHeight();

            result.css('backgroundImage', 'url(' + img.attr('src') + ')');
            result.css('backgroundSize', img.width() * cx + 'px ' + img.height() * cy + 'px');

            lens.mousemove(function(e) {
                moveLens(e);
            });
            img.mousemove(function(e) {
                moveLens(e);
            });
            lens.on('touchmove', function() {
                moveLens();
            });
            img.on('touchmove', function() {
                moveLens();
            });

            function moveLens(e) {
                var x = e.clientX - lens.outerWidth() / 2;
                var y = e.clientY - lens.outerHeight() / 2;
                if (x > img.outerWidth() + img.offset().left - lens.outerWidth()) {
                    x = img.outerWidth() + img.offset().left - lens.outerWidth();
                }
                if (x < img.offset().left) {
                    x = img.offset().left;
                }
                if (y > img.outerHeight() + img.offset().top - lens.outerHeight()) {
                    y = img.outerHeight() + img.offset().top - lens.outerHeight();
                }
                if (y < img.offset().top) {
                    y = img.offset().top;
                }
                lens.offset({
                    top: y,
                    left: x
                });
                result.css('backgroundPosition', '-' + (x - img.offset().left) * cx + 'px -' + (y - img.offset().top) *
                    cy +
                    'px');
            }
        }
    }

    function changeSlide(elm) {
        $('.slideshow-items').removeClass('active');
        $('.slideshow-items').eq(elm.index()).addClass('active');
        $('.slideshow-thumbnails').removeClass('active');
        $('.slideshow-thumbnails').eq(elm.index()).addClass('active');
    }
    </script>

</head>

<body class="single-product-page">
    <x-header />
    <?php
     $valData = '0';
                if (isset($_GET['color'])) {
                    $valData = $_GET['color'];
                    if($valData == 3)
                    {
                        unset($mainimage);
                        $mainimage = $thirdimage;
                    }

                    if($valData == 1)
                    {
                        unset($mainimage);
                        $mainimage = $firstimage;
                    }
                    if($valData == 2)
                    {
                        unset($mainimage);
                        $mainimage = $secondimage;
                    }
                }
    ?>
    <div class="container-fluid pt-4 main-content">
        <form action="" id="singleProduct">
            @csrf
            <input type="hidden" value="{{ $product->slug }}" id="slug">
            <input type="hidden" name="color" value="{{ $valData }}">
            <input type="hidden" name="pid" value="{{ $product->id }}">
            <input type="hidden" name="catname" value="{{ $member->category_name}}">
            <div class="row row-2 mb-3">
                <div class="col-12">
                    <p><a href="#">Home</a> /<a href="#"> Shop / </a><a
                            href="#">{{ $product->p_name }}</a>{{ session('pcolor') }}</p>
                </div>
            </div>
            <div class="row row-2">
                <div class="col-12 col-md-1 order-2 order-md-1 slider-flex-colum">
                    <img src="/recent-products-thumb/{{ $mainimage[0] }}" alt="Main Image" id="mainImage"
                        class="slideshow-thumbnails active" width="100%">
                    <img src="/recent-products-thumb/{{ $mainimage[1] }}" alt="Main Image" id="mainImage"
                        class="slideshow-thumbnails" width="100%">
                    <img src="/recent-products-thumb/{{ $mainimage[2] }}" alt="Main Image" id="mainImage"
                        class="slideshow-thumbnails" width="100%">
                    <img src="/recent-products-thumb/{{ $mainimage[3] }}" alt="Main Image" id="mainImage"
                        class="slideshow-thumbnails" width="100%">
                    <img src="/recent-products-thumb/{{ $mainimage[4] }}" alt="Main Image" id="mainImage"
                        class="slideshow-thumbnails" width="100%">
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2">

                    <div id='lens'></div>

                    <div id='slideshow-items-container'>

                        <img class='slideshow-items active' src='/products/{{ $mainimage[0] }}' />
                        <img class='slideshow-items' src='/products/{{ $mainimage[1] }}' />
                        <img class='slideshow-items' src='/products/{{ $mainimage[2] }}' />
                        <img class='slideshow-items' src='/products/{{ $mainimage[3] }}' />
                        <img class='slideshow-items' src='/products/{{ $mainimage[4] }}' />

                    </div>

                    <div id='result'></div>

                </div>

                <div class="col-12 col-md-4 order-3 order-md-3">
                    <h2 class="product-category">{{ $member->category_name}}</h2>
                    <p class="product-name">{{ $product->p_name }}</p>
                    <hr>
                    <p class="price">₹{{ $product->r_price }} <span><del>MRP ₹{{ $product->p_price }}</del>
                            (<?php
                      $actval = $product->p_price; // 12000
                      $relval = $product->r_price; // 11000
                      $percentage = ($relval * 100)/$actval;
                      echo (int)(100-$percentage); 
                    ?>
                            % OFF)
                        </span></p>
                    <span style="color:green">inclusive of all taxes</span>

                    @if(is_array($firstimage))
                    <p class="mt-4 mb-2"><b>More Colors</b></p>
                    <div class="morecolor d-flex justify-content-start">
                        <a href="?color=1" onclick="location.reload();">
                            <img src="/products-thumb/{{ $firstimage[0] }}" alt="" width="100%">
                        </a>
                        <a href="?color=2" onclick="location.reload();">
                            <img src="/products-thumb/{{ $secondimage[0] }}" alt="" width="100%">
                        </a>
                        <a href="?color=3" onclick="reloadAfterDelay(3000);">
                            <img src="/products-thumb/{{ $thirdimage[0] }}" alt="" width="100%">
                        </a>
                    </div>
                    @endif


                    <p class="mt-4 mb-2"><b>Write Your Free Size</b></p>
                    <?php
                      $string = $product->sizes;
                      $words = explode(", ", $string); 
                      ?>

                    <div class="sizes">
                        @foreach($words as $word)
                        @if($word == 'fs')
                        <div class="size me-3">
                            <textarea name="size" id="" placeholder="Like:&#10;Blouse: Fits up to 38 inches (Can be altered up to 42 inches)&#10;Lehenga Waist: Adjustable, fits up to 42 inches&#10;Lehenga Length: Approx. 42-44 inches" style="width: 100%;height: 196px;"></textarea>

                        </div>
                        @endif
                        @if($word == 's')
                        <div class="size me-3">
                            <input id="size" class="form-check-input" value="S" type="radio" name="size" checked>
                            <p>S</p>
                        </div>
                        @endif
                        @if($word == 'm')
                        <div class="size me-3">
                            <input id="size" class="form-check-input" value="M" type="radio" name="size" required>
                            <p>M</p>
                        </div>
                        @endif
                        @if($word == 'l')
                        <div class="size me-3">
                            <input id="size" class="form-check-input" value="L" type="radio" name="size" required>
                            <p style="left: 20px;">L</p>
                        </div>
                        @endif
                        @if($word == 'xl')
                        <div class="size me-3">
                            <input id="size" class="form-check-input" value="XL" type="radio" name="size" required>
                            <p style="left: 14px;">XL</p>
                        </div>
                        @endif
                        @if($word == 'xxl')
                        <div class="size me-3">
                            <input id="size" class="form-check-input" value="XXL" type="radio" name="size" required>
                            <p style="left: 8px;">XXL</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="buttons d-flex justify-content-start mt-4">
                        <button type="button" class="add-to-card button1 globalbtn me-3" id="addtocart"><i
                                class="fa-solid fa-bag-shopping"></i>
                            Add to Bag</button>
                        <a href="/faq" class="wishlist button2"><i class="fa-solid fa-circle-question"></i> F.A.Q</a>
                    </div>
                    <hr>
                    <div class="product-details mt-4">
                        <p class="mt-3 mb-3"><b>Product Details</b></p>
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="col-12 col-md-3 order-4 order-md-4">
                    <div class="offercard">
                        <label for="">
                            <?php
                          $currentTimestamp = time();
                          $oneWeekLaterTimestamp = $currentTimestamp + (7 * 24 * 60 * 60);
                          $oneWeekLaterFormatted = date("l jS \of F Y h:i:s A", $oneWeekLaterTimestamp);
                          ?>

                            FREE delivery {{ $oneWeekLaterFormatted }}
                        </label>
                        <label for="">
                            Processing Time: 1-2 days<br>
	                        Shipping Time: 5-6 days<br>
	                        Total Delivery Time: 7 days
                        </label>
                        <label for="">
                            Delivering to Haldwani 263139 - Update location
                        </label>
                        <hr>
                        <label for="" style="color:green;font-size:28px">In stock</label>
                        <label for="">
                            Ships from : Shiprocket <br>
                            Sold by : Byoli Studio
                        </label>


                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr class="mt-5">

    <div class="container-fluid similar-product mb-5">
        <div class="row row-2 mb-3 mt-5">
            <div class="col-12">
                <h3>Similar Products</h2>
            </div>
        </div>
        <div class="row row-2">
            @foreach($simproducts as $simproduct)
            @if($simproduct->category_name == $member->category_name)
            <div class="col-6 col-md-2 mb-4">
                <div class="productcard">
                    <a href="/shop/{{ $simproduct->slug }}">
                        @php
                        $image = json_decode($simproduct->p_image);
                        @endphp
                        <img src="/products/{{ $image[0] }}" alt="" width="100%">
                        <p class="category"><b>{{ $simproduct->category_name }}</b></p>
                        <p class="product-name">{{ $simproduct->p_name }}</p>
                        <p class="price">Rs. {{ $simproduct->r_price }}</p>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <div id="sidebarpopup" class="container container-sidebar-popup">
        <div id="getformdata"></div>
    </div>

    <hr>

<div class="container py-5">
    <h2 style="color:#000;font-weight:bold">Top Reviews</h2>
    <div class="row">
        @foreach($reviewcal as $reviewcal)
        @if($reviewcal->id == $product->id)
        <?php
        $rating = $reviewcal->avg_rating;
        ?>
        @endif
        @endforeach

        @foreach($allreviews as $allreviews)
        @if($allreviews->productid === $product->id)
        <div class="col-12 col-md-4 py-3 py-md-3">
            <div class="mm-review">
                <div class="profile d-flex">
                    <img src="/assets/imgs/default.png" alt="" width="20px" style="object-fit: contain;">
                    <p class="name ms-2">{{$allreviews->rusername}}</p>
                </div>
                <div class="starrating d-flex align-items-center">
                    <svg width="68" height="30" viewBox="0 0 150 30" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <symbol id="star" viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.433 8.208 1.193-5.938 5.793 1.402 8.187L12 18.897l-7.34 3.866 1.402-8.187-5.938-5.793 8.208-1.193z" />
                            </symbol>
                        </defs>
                        <use href="#star" x="0" y="0" width="30" height="30" @if($rating>0)
                            fill="orange"
                            @else
                            fill="none" stroke="orange" stroke-width="2"
                            @endif
                            />
                            <use href="#star" x="30" y="0" width="30" height="30" @if($rating>1)
                                fill="orange"
                                @else
                                fill="none" stroke="orange" stroke-width="2"
                                @endif
                                />
                                <use href="#star" x="60" y="0" width="30" height="30" @if($rating>2)
                                    fill="orange"
                                    @else
                                    fill="none" stroke="orange" stroke-width="2"
                                    @endif
                                    />
                                    <use href="#star" x="90" y="0" width="30" height="30" @if($rating>3)
                                        fill="orange"
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="120" y="0" width="30" height="30" @if($rating>4)
                                            fill="orange"
                                            @else
                                            fill="none" stroke="orange" stroke-width="2"
                                            @endif
                                            />

                    </svg>
                    <span class="review-headline" style="font-weight: bold;margin-left: 10px;"> {{$allreviews->headline}}</span>
                </div>

                <div class="des">
                    <p>{{$allreviews->preview}}</p>
                </div>
                <div class="media">
                    @php
                    // Get the file extension
                    $extension = pathinfo($allreviews->mediafile, PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <!-- Display Image -->
                    <img src="/review/{{ $allreviews->mediafile }}" alt="{{ $allreviews->mediafile }}"
                        width="300px" class="mt-3">
                    @elseif(in_array($extension, ['mp4', 'ogg', 'webm']))
                    <!-- Display Video -->
                    <video width="320" height="240" controls>
                        <source src="/review/{{ $allreviews->mediafile }}" type="video/{{ $extension }}">
                        Your browser does not support the video tag.
                    </video>
                    @else
                    <!-- If file type is unsupported -->
                    <p></p>
                    @endif
                </div>

            </div>
        </div>



        @endif
        @endforeach
    </div>

</div>
    @if((session()->has('cusername') || session()->has('cemail')) && session()->has('cpassword'))
   

    <hr>
    <div class="container mt-5 review-container" id="writeReviews">
        <h2 style="color:#000;font-weight:bold" class="py-3">Write Review</h2>
        <form action="" id="reviewForm" method="POST">
            @csrf
            <input type="hidden" name="rusername" value="{{ session('cusername') }}" >
            <input type="hidden" name="rpassword" value="{{ session('cpassword') }}">
            <div class="imgbox d-flex align-items-center py-3">
                <img src="/recent-products-thumb/{{ $mainimage[0] }}" alt="{{ $mainimage[0] }}" width="40px"
                    style="margin-right:20px">
                <p class="fs-5">{{ $product->p_name }}</p>
                <input type="hidden" name="productid" value="{{ $product->id }}">
            </div>
            <hr>
            <label>Overall rating</label>
            <div class="mb-3" id="star-rating">
                <i class="far fa-star star" data-value="1"></i>
                <i class="far fa-star star" data-value="2"></i>
                <i class="far fa-star star" data-value="3"></i>
                <i class="far fa-star star" data-value="4"></i>
                <i class="far fa-star star" data-value="5"></i>
                <input type="hidden" name="starrating" id="starrating" value="">
            </div>

            <div class="my-4">
                <label for="headline" class="form-label">Add a headline</label>
                <input type="text" class="form-control" name="headline" id="headline"
                    placeholder="What's most important to know?" required>
            </div>

            <div class="mt-5">
                <label class="form-label">Add a photo or video</label>
                <div class="">
                    <input type="file" id="mediaUpload" class="form-control" accept="image/*,video/*" name="mediafile">
                    <br>
                    <img id="preview" src="image.png" class="me-2"
                        style="width: 80px; height: 80px; object-fit: cover; display: none;">
                    <video id="videoPreview" class="me-2" style="width: 80px; height: 80px; display: none;"
                        controls></video>
                    <br>
                </div>
            </div>

            <div class="mb-4">
                <label for="review" class="form-label">Add a written review</label>
                <textarea name="preview" class="form-control" id="review" rows="4"
                    placeholder="What did you like or dislike? What did you use this product for?" required></textarea>
            </div>

            <p class="text-muted">We will notify you via email as soon as your review is processed.</p>

            <button class="btn btn-warning mb-5 mt-3" type="button" id="productReview">Submit</button>
            <img src="/assets/imgs/spinner.gif" alt="" width="26px" id="CtSpinner">
            <p id="messagehere" class="text-success">Thank You for Review.</p>
        </form>
    </div>
    @else
     <div class="container py-5">
        <hr>
        <button class="btn btn-secondary py-2 px-3" onclick="window.location='/dashboard'">Write a Review</button>
     </div>
    @endif
    

    <x-footer facebook="{{ isset($gseo->facebook) ? $gseo->facebook : '' }}"
        linkedin="{{ isset($gseo->linkedin) ? $gseo->linkedin : '' }}"
        instagram="{{ isset($gseo->instagram) ? $gseo->instagram : '' }}"
        twitter="{{ isset($gseo->twitter) ? $gseo->twitter : '' }}"
        youtube="{{ isset($gseo->youtube) ? $gseo->youtube : '' }}"
        mail="{{ isset($gseo->whatsapp) ? $gseo->whatsapp : '' }}" />

    <script type="text/javascript" src="/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="/assets/js/front/footer.js"></script>

</body>
<script src="/assets/js/front/productreview.js"></script>

<script>
$('.slideshow-thumbnails').hover(function() {
    changeSlide($(this));
});

if ($(window).width() > 768) {

    $(document).mousemove(function(e) {
        var x = e.clientX;
        var y = e.clientY;

        var imgx1 = $('.slideshow-items.active').offset().left;
        var imgx2 = $('.slideshow-items.active').outerWidth() + imgx1;
        var imgy1 = $('.slideshow-items.active').offset().top;
        var imgy2 = $('.slideshow-items.active').outerHeight() + imgy1;

        if (x > imgx1 && x < imgx2 && y > imgy1 && y < imgy2) {
            $('#lens').show();
            $('#result').show();
            imageZoom($('.slideshow-items.active'), $('#result'), $('#lens'));
        } else {
            $('#lens').hide();
            $('#result').hide();
        }
    });

    function imageZoom(img, result, lens) {
        result.width(img.innerWidth());
        result.height(img.innerHeight());
        lens.width(img.innerWidth() / 2);
        lens.height(img.innerHeight() / 2);

        result.offset({
            top: img.offset().top,
            left: img.offset().left + img.outerWidth() + 50
        });

        var cx = img.innerWidth() / lens.innerWidth();
        var cy = img.innerHeight() / lens.innerHeight();

        result.css('backgroundImage', 'url(' + img.attr('src') + ')');
        result.css('backgroundSize', img.width() * cx + 'px ' + img.height() * cy + 'px');

        lens.mousemove(function(e) {
            moveLens(e);
        });
        img.mousemove(function(e) {
            moveLens(e);
        });
        lens.on('touchmove', function() {
            moveLens();
        });
        img.on('touchmove', function() {
            moveLens();
        });

        function moveLens(e) {
            var x = e.clientX - lens.outerWidth() / 2;
            var y = e.clientY - lens.outerHeight() / 2;
            if (x > img.outerWidth() + img.offset().left - lens.outerWidth()) {
                x = img.outerWidth() + img.offset().left - lens.outerWidth();
            }
            if (x < img.offset().left) {
                x = img.offset().left;
            }
            if (y > img.outerHeight() + img.offset().top - lens.outerHeight()) {
                y = img.outerHeight() + img.offset().top - lens.outerHeight();
            }
            if (y < img.offset().top) {
                y = img.offset().top;
            }
            lens.offset({
                top: y,
                left: x
            });
            result.css('backgroundPosition', '-' + (x - img.offset().left) * cx + 'px -' + (y - img.offset().top) * cy +
                'px');
        }
    }
}

function changeSlide(elm) {
    $('.slideshow-items').removeClass('active');
    $('.slideshow-items').eq(elm.index()).addClass('active');
    $('.slideshow-thumbnails').removeClass('active');
    $('.slideshow-thumbnails').eq(elm.index()).addClass('active');
}
</script>



<script>
$(document).ready(function() {
    $("#addtocart").click(function() {
        var slug = $("#slug").val();
        var form = $("#singleProduct")[0];
        var formData = new FormData(form);


        $.ajax({
            type: "POST",
            url: "/shop/" + slug,
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                document.querySelector("#sidebarpopup").style.display = "block";
                $("#getformdata").html(res);
            }
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star");
    stars.forEach(star => {
        star.addEventListener("click", function() {
            let value = this.getAttribute("data-value");
            stars.forEach(s => s.classList.remove("selected"));
            for (let i = 0; i < value; i++) {
                stars[i].classList.add("selected");
            }
        });
    });

    document.getElementById("mediaUpload").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const previewImage = document.getElementById("preview");
            const previewVideo = document.getElementById("videoPreview");
            const reader = new FileReader();
            reader.onload = function(e) {
                if (file.type.startsWith("image")) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                    previewVideo.style.display = "none";
                } else if (file.type.startsWith("video")) {
                    previewVideo.src = e.target.result;
                    previewVideo.style.display = "block";
                    previewImage.style.display = "none";
                }
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>


</html>