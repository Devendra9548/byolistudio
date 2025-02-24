<div class="ds-header container-fluid py-0 bg-black" style="background:#000!important">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <p class="text-center m-0 text-white top-bar-text">Free shipping in India | Worldwide Free Shipping
                    Above ₹20,000
                </p>
            </div>
            <div class="col-2">
                <div class="social-card d-flex justify-content-end align-items-center">
                    <a href="https://www.facebook.com/share/1AJ8Y8VtPL/?mibextid=LQQJ4d" target="_blank" class="me-3 text-white"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="https://www.instagram.com/byolistudio?igsh=OWJ4c2ozc3NrZDI=" target="_blank" class="text-white"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
<header class="ds-header">
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="logo text-center">
                        <a href="/">
                            <img src="/assets/imgs/logo-biyoli.png" alt="myntra" width="80px" class="text-center">
                        </a>
                    </div>
                </div>


                <div class="col-3 d-flex align-items-center justify-content-end">
                <div class="cards d-flex align-items-center">
                    <div class="wishlist text-center me-4">
                        <p><a href="/faq"><i class="fa-regular fa-circle-question" style="font-size:23px"></i></a></p>
                        <p class="name"><a href="/faq">Faq</a></p>
                    </div>
                    <div class="cart text-center me-4 position-relative">
                        <p><a href="/add-to-cart"><img src="/assets/imgs/market.png" alt="" style="width: 26px;margin-top: -8px;"></a></p>
                        <p class="name"><a href="/add-to-cart" style="margin-top: 2px !important;display: block;">Cart 
                        @if(session('cart'))
                            @if(count(session('cart')) > 0)
                            <span style="position: absolute;top: 8px;background: #000 !important;padding: 0px !important;height: 20px;width: 20px;font-size: 12px !important;display: flex;justify-content: center;align-items: center;border-radius: 100px;left: 11px;color: #fff;font-weight: bold;">
                            {{ count(session('cart')) }}
                            </span>
                            @endif
                        @endif
                    </a>

                        </p>
                    </div>
                    <div class="login text-center">
                        <p><a href="{{ route('login.dashboard')}}"><i class="fa-regular fa-user" style="font-size:22px"></i></a></p>
                        <p class="name"><a href="{{ route('login.dashboard')}}">
                                @if((session()->has('cusername') || session()->has('cemail')) &&
                                session()->has('cpassword'))
                                {{ session('cusername') }}
                                @else
                                Profile
                                @endif
                            </a></p>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navb">
                    <ul class="d-flex justify-content-center align-items-center m-0 p-0" style="list-style:none">
                        <li><a href="/">Home</a></li>
                        <li><a href="/shop?category=pichora">Pichora</a></li>
                        <li class="p-menu"><a href="/shop?category=lehenga">Lehenga <i class="fa-solid fa-chevron-down"
                                    style="font-size:12px"></i></a>
                            <div class="submenu sub-p-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                            <ul class="m-0 p-0" style="list-style:none">
                                                <li><a href="#">PARTY WEAR LEHENGAS</a></li>
                                                <li><a href="#">BRIDAL LEHENGAS</a></li>
                                                <li><a href="#">BRIDAL SAREES</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="/shop">Stalls</a></li>
                        <li><a href="/shop?category=accessories">Accessories</a></li>
                        <li><a href="/blog">What's New</a></li>
                        <li><a href="/shop">Our Collection</a></li>
                        <li><a href="#" onclick="showSearch()"><i class="fa-solid fa-magnifying-glass"></i> </a></li>
                        <!-- <li class="p-menu"><a href="#">Women's <i class="fa-solid fa-chevron-down"
                                    style="font-size:12px"></i></a>
                            <div class="submenu sub-p-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-3">
                                            <ul class="m-0 p-0" style="list-style:none">
                                                <li><a href="#">PARTY WEAR LEHENGAS</a></li>
                                                <li><a href="#">BRIDAL LEHENGAS</a></li>
                                                <li><a href="#">BRIDAL SAREES</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-3 nav-products">
                                            <a href="#" class="m-0 p-0">
                                                <img src="https://cdn.shopify.com/s/files/1/0614/1594/8468/files/MBPD1054GREY_360x.jpg?v=1697866615"
                                                    alt="">
                                                <div class="product-des">
                                                    <p class="text-center">Grey Sequins Embroidered Georgette Lehenga
                                                        Set</p>
                                                    <p class="text-center price mt-1">Rs. 34,980</p>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Men's</a></li>
                        <li><a href="#">Kid's</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Women's</a></li>
                        <li><a href="#">Women's</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<header class="header mb-header">
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-2">
                <div class="logo">
                    <a href="/">
                        <img src="/assets/imgs/logo-biyoli.png" alt="myntra" width="60px">
                    </a>
                </div>
            </div>
            <div class="col-8 d-flex align-items-center justify-content-center">
                <form action="/shop" class="position-relative mb-searchbar">
                    <input type="text" name="search" placeholder="Search Cloths">
                    <button type="submit" class="position-absolute r-0"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end">
                
                <p class="text-end pe-2" id="menuburgar"><a href="#"><i class="fa-solid fa-bars fs-2"></i></a></p>
                <nav class="navbar" id="mbnav">
                    <ul class="m-0 p-0">
                        <li id="closeiconmenu" class="text-end" style="position: absolute;right: 0;z-index: 223;"><a
                                href=""><i class="fa-solid fa-rectangle-xmark"
                                    style="color:#fff;font-size:32px!important"></i></a></li>
                        <li style="margin-top:20px"><a href="/shop?category=lehenga">Lehenga</a></li>
                        <li><a href="/shop?category=pichora">Pichora</a></li>
                        <li><a href="/shop">Stalls</a></li>
                        <li><a href="/shop?category=accessories">Accessories</a></li>
                        <li><a href="/contact-us">Contact Us</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/add-to-cart">Cart</a></li>
                        <li><a href="/dashboard">Profile</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <hr style="margin: 0px!important;">
</header>

<div class="container search-bar py-5">
    <div class="row py-5">
        <div class="col-12 d-flex justify-content-end">
        <a href="#" id="closeSearch" onclick="closeSearch()"><i class="fa fa-window-close text-white" aria-hidden="true" style="font-size: 30px !important;position: absolute;right: 30px;top: 30px;"></i></a>
        </div>
        <div class="col-2"></div>
        <div class="col-8">
            <form action="/shop">
                <div class="header-top-searchbar" class="d-flex justify-content-center align-items-center">
                    <input type="text" name="search" class="form-control search-input" placeholder="Type Product Name Here..." required>
                    <button type="submit" class="btn btn-primary d-block search-btn" style=""><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="col-2">
            
        </div>
    </div>
</div>


<script>
document.querySelector("#menuburgar").addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector("#mbnav").style.display = "block";
});

document.querySelector("#closeiconmenu").addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector("#mbnav").style.display = "none";
});

function closeSearch(){
    document.querySelector(".search-bar").style.display = "none";
}
function showSearch(){
    document.querySelector(".search-bar").style.display = "block";
}
</script>