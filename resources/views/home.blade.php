@extends('templates.front.main')
@section('customcss')
<link rel="stylesheet" href="/assets/css/front/home.css">

@endsection

@section('body')


 


@foreach($homepage as $homepage)
<div class="main-container" style="margin-top:-5px">
@if($homepage->selecthero == 0)
    <div class="hero-section-slider">
        @if($homepage->slide1)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide1}}" alt="{{$homepage->slide1}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide2)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide2}}" alt="{{$homepage->slide2}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide3)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide3}}" alt="{{$homepage->slide3}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide4)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide4}}" alt="{{$homepage->slide4}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide5)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide5}}" alt="{{$homepage->slide5}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide6)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide6}}" alt="{{$homepage->slide6}}"
                width="100%">
        </div>
        @endif
        @if($homepage->slide7)
        <div class="for-desktop-slides">
            <img src="/home/{{$homepage->slide7}}" alt="{{$homepage->slide7}}"
                width="100%">
        </div>
        @endif


        <!-- For Mobile -->

        @if($homepage->mbslide1)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide1}}" alt="{{$homepage->mbslide1}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide2)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide2}}" alt="{{$homepage->mbslide2}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide3)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide3}}" alt="{{$homepage->mbslide3}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide4)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide4}}" alt="{{$homepage->mbslide4}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide5)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide5}}" alt="{{$homepage->mbslide5}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide6)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide6}}" alt="{{$homepage->mbslide6}}"
                width="100%">
        </div>
        @endif
        @if($homepage->mbslide7)
        <div class="for-mb-slides">
            <img src="/home/{{$homepage->mbslide7}}" alt="{{$homepage->mbslide7}}"
                width="100%">
        </div>
        @endif

    </div>
 @else
 <div class="hero-section">
    <div class="video-wrapper" id="player">
        <iframe
            src="https://www.youtube.com/embed/TgtnWM2jEF0?autoplay=1&mute=1&loop=1&playlist=TgtnWM2jEF0&rel=0&controls=0&modestbranding=1&iv_load_policy=3&disablekb=1"
            title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        </iframe>
    </div>
</div>

 @endif

</div>
@endforeach

<section class="d-section">
    <div class="container-fluid">
        <div class="row mb-15-px-mob">
            <div class="col-7 col-md-10 d-flex justify-content-start align-items-center">
                <h2>Shop By Lehenga</h2>
            </div>
            <div class="col-5 col-md-2 d-flex justify-content-end align-items-center">
                <a href="/shop?category=lehenga" class="globalbtn">See More <i
                        class="fa-solid fa-angles-right"></i></a>
            </div>
            <div class="col-12 d-none-mob">
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="shopbycategory">
                    @foreach($products as $product)

                    @if($product->category_name == 'Lehenga')
                    <div class="slide-cols">
                        <div class="scard">
                            <?php
                             $reviews = $product->review_count;
                             $rating = $product->avg_rating;
                            ?>
                            <a href="/shop/{{ $product->slug }}">
                                @php
                                $image = json_decode($product->p_image);
                                @endphp
                                <img src="/products/{{ $image[0] }}" alt="2" width="100%" class="hover-first-img">
                                <img src="/products/{{ $image[1] }}" alt="2" width="100%" class="hover-second-img">
                            
                                @if($reviews!=0)
                                <div class="starrating d-flex align-items-center">
                                    <svg width="68" height="30" viewBox="0 0 150 30"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <symbol id="star" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.433 8.208 1.193-5.938 5.793 1.402 8.187L12 18.897l-7.34 3.866 1.402-8.187-5.938-5.793 8.208-1.193z" />
                                            </symbol>
                                        </defs>
                                        <use href="#star" x="0" y="0" width="30" height="30" 
                                        @if($rating>0)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="30" y="0" width="30" height="30" 
                                        @if($rating>1)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="60" y="0" width="30" height="30" 
                                        @if($rating>2)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="90" y="0" width="30" height="30" 
                                        @if($rating>3)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="120" y="0" width="30" height="30" 
                                        @if($rating>4)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                            
                                    </svg>
                                    <span class="count-review"> ({{ $product->review_count }} reviews)</span>
                                </div>
                                @endif

                                <p class="title">{{ $product->p_name }}</p>
                                <p class="price pt-1">₹{{ $product->p_price }}</p>

                                <p class="offer"><?php
                      $actval = $product->p_price; // 12000
                      $relval = $product->r_price; // 11000
                      $percentage = ($relval * 100)/$actval;
                      echo (int)(100-$percentage); 
                    ?>% OFF</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-section">
    <div class="container-fluid">
        <div class="row mb-15-px-mob">
            <div class="col-7 col-md-10 d-flex justify-content-start align-items-center">
                <h2>Shop By Pichora</h2>
            </div>
            <div class="col-5 col-md-2 d-flex justify-content-end align-items-center">
                <a href="/shop?category=pichora" class="globalbtn">See More <i
                        class="fa-solid fa-angles-right"></i></a>
            </div>
            <div class="col-12 d-none-mob">
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="shopbycategory">
                    @foreach($products as $product)

                    @if($product->category_name == 'Pichora')
                    <div class="slide-cols">
                        <div class="scard">
                            <?php
                             $reviews = $product->review_count;
                             $rating = $product->avg_rating;
                            ?>
                            <a href="/shop/{{ $product->slug }}">
                                @php
                                $image = json_decode($product->p_image);
                                @endphp
                                <img src="/products/{{ $image[0] }}" alt="2" width="100%" class="hover-first-img">
                                <img src="/products/{{ $image[1] }}" alt="2" width="100%" class="hover-second-img">
                            
                                @if($reviews!=0)
                                <div class="starrating d-flex align-items-center">
                                    <svg width="68" height="30" viewBox="0 0 150 30"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <symbol id="star" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.433 8.208 1.193-5.938 5.793 1.402 8.187L12 18.897l-7.34 3.866 1.402-8.187-5.938-5.793 8.208-1.193z" />
                                            </symbol>
                                        </defs>
                                        <use href="#star" x="0" y="0" width="30" height="30" 
                                        @if($rating>0)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="30" y="0" width="30" height="30" 
                                        @if($rating>1)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="60" y="0" width="30" height="30" 
                                        @if($rating>2)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="90" y="0" width="30" height="30" 
                                        @if($rating>3)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="120" y="0" width="30" height="30" 
                                        @if($rating>4)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                            
                                    </svg>
                                    <span class="count-review"> ({{ $product->review_count }} reviews)</span>
                                </div>
                                @endif

                                <p class="title">{{ $product->p_name }}</p>
                                <p class="price pt-1">₹{{ $product->p_price }}</p>

                                <p class="offer"><?php
                      $actval = $product->p_price; // 12000
                      $relval = $product->r_price; // 11000
                      $percentage = ($relval * 100)/$actval;
                      echo (int)(100-$percentage); 
                    ?>% OFF</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<section class="d-section">
    <div class="container-fluid">
        <div class="row mb-15-px-mob">
            <div class="col-7 col-md-10 d-flex justify-content-start align-items-center">
                <h2>Shop By Accessories</h2>
            </div>
            <div class="col-5 col-md-2 d-flex justify-content-end align-items-center">
                <a href="/shop?category=accessories" class="globalbtn">See More <i
                        class="fa-solid fa-angles-right"></i></a>
            </div>
            <div class="col-12 d-none-mob">
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="shopbycategory">
                    @foreach($products as $product)

                    @if($product->category_name == 'Accessories')
                    <div class="slide-cols">
                        <div class="scard">
                            <?php
                             $reviews = $product->review_count;
                             $rating = $product->avg_rating;
                            ?>
                            <a href="/shop/{{ $product->slug }}">
                                @php
                                $image = json_decode($product->p_image);
                                @endphp
                                <img src="/products/{{ $image[0] }}" alt="2" width="100%" class="hover-first-img">
                                <img src="/products/{{ $image[1] }}" alt="2" width="100%" class="hover-second-img">
                            
                                @if($reviews!=0)
                                <div class="starrating d-flex align-items-center">
                                    <svg width="68" height="30" viewBox="0 0 150 30"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <symbol id="star" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.433 8.208 1.193-5.938 5.793 1.402 8.187L12 18.897l-7.34 3.866 1.402-8.187-5.938-5.793 8.208-1.193z" />
                                            </symbol>
                                        </defs>
                                        <use href="#star" x="0" y="0" width="30" height="30" 
                                        @if($rating>0)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="30" y="0" width="30" height="30" 
                                        @if($rating>1)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="60" y="0" width="30" height="30" 
                                        @if($rating>2)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="90" y="0" width="30" height="30" 
                                        @if($rating>3)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="120" y="0" width="30" height="30" 
                                        @if($rating>4)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                            
                                    </svg>
                                    <span class="count-review"> ({{ $product->review_count }} reviews)</span>
                                </div>
                                @endif

                                <p class="title">{{ $product->p_name }}</p>
                                <p class="price pt-1">₹{{ $product->p_price }}</p>

                                <p class="offer"><?php
                      $actval = $product->p_price; // 12000
                      $relval = $product->r_price; // 11000
                      $percentage = ($relval * 100)/$actval;
                      echo (int)(100-$percentage); 
                    ?>% OFF</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-section">
    <div class="container-fluid">
        <div class="row mb-15-px-mob">
            <div class="col-7 col-md-10 d-flex justify-content-start align-items-center">
                <h2>Shop By Stalls</h2>
            </div>
            <div class="col-5 col-md-2 d-flex justify-content-end align-items-center">
                <a href="/shop" class="globalbtn">See More <i
                        class="fa-solid fa-angles-right"></i></a>
            </div>
            <div class="col-12 d-none-mob">
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="shopbycategory">
                    @foreach($products as $product)

                    @if($product->category_name == 'Pichora')
                    <div class="slide-cols">
                        <div class="scard">
                            <?php
                             $reviews = $product->review_count;
                             $rating = $product->avg_rating;
                            ?>
                            <a href="/shop/{{ $product->slug }}">
                                @php
                                $image = json_decode($product->p_image);
                                @endphp
                                <img src="/products/{{ $image[0] }}" alt="2" width="100%" class="hover-first-img">
                                <img src="/products/{{ $image[1] }}" alt="2" width="100%" class="hover-second-img">
                            
                                @if($reviews!=0)
                                <div class="starrating d-flex align-items-center">
                                    <svg width="68" height="30" viewBox="0 0 150 30"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <symbol id="star" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.433 8.208 1.193-5.938 5.793 1.402 8.187L12 18.897l-7.34 3.866 1.402-8.187-5.938-5.793 8.208-1.193z" />
                                            </symbol>
                                        </defs>
                                        <use href="#star" x="0" y="0" width="30" height="30" 
                                        @if($rating>0)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="30" y="0" width="30" height="30" 
                                        @if($rating>1)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="60" y="0" width="30" height="30" 
                                        @if($rating>2)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="90" y="0" width="30" height="30" 
                                        @if($rating>3)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                        <use href="#star" x="120" y="0" width="30" height="30" 
                                        @if($rating>4)
                                        fill="orange" 
                                        @else
                                        fill="none" stroke="orange" stroke-width="2"
                                        @endif
                                        />
                                            
                                    </svg>
                                    <span class="count-review"> ({{ $product->review_count }} reviews)</span>
                                </div>
                                @endif

                                <p class="title">{{ $product->p_name }}</p>
                                <p class="price pt-1">₹{{ $product->p_price }}</p>

                                <p class="offer"><?php
                      $actval = $product->p_price; // 12000
                      $relval = $product->r_price; // 11000
                      $percentage = ($relval * 100)/$actval;
                      echo (int)(100-$percentage); 
                    ?>% OFF</p>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('customjs')
<script>
$('.hero-section-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-arrow-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-arrow-right"></i></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]

});
</script>
<script src="/assets/js/front/home.js"></script>
@endsection