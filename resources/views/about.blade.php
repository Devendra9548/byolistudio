@extends('templates.front.main')
@section('customcss')
<link rel="stylesheet" href="/assets/css/front/about.css" />
@endsection
@section('body')

<div class="container-fluid bg-dark breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p style="margin:0px" class="py-3"><a href="/">Home</a> » <a href="#">About Us</a></p>
            </div>
        </div>
    </div>
</div>
<div class="container my-3 my-md-5">
    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1 mt-3 mt-md-0">
            <h1>About Us</h1>
            <p class="mt-3">
                Almost every girl dreams of becoming a bride and wearing her dream attire while embracing her culture.
                With this in mind, <strong>Verma Textiles, since 1992</strong>, introduced <strong>Byoli Studio</strong> and began the journey of crafting
                authentic bridal wear that reflects the true spirit of Kumaoni culture. But, over the years, we
                witnessed a transformation—brides who cherished tradition yet longed for a touch of modern grace. So, we
                embraced this change with open arms.</p>
             <p class="mt-3">
                We reimagined the classic <strong>Pichora and Lehenga</strong>, blending the elegance of our heritage with the dreams of
                today’s brides. For us every bride is special so we listen to her heart, understand her dreams, and
                create something truly one-of-a-kind. Every stitch, every motif, and every colour is chosen with <strong>love
                and devotion</strong>, ensuring that she feels not just beautiful, but deeply connected to her heritage on the
                most important day of her life.</p>
              
              <p class="mt-3">
                For over <strong>three decades, Byoli Studio</strong> has been more than just a brand—it has been a part of countless
                love stories, celebrations, and cherished memories. So, when you wear Byoli Studio, you don’t just wear
                an outfit—you wear history, love, and the soul of Uttarakhand. Whether you are a bride-to-be, a daughter
                honouring her traditions, or a woman embracing her roots, we are here to make your journey
                unforgettable.
            </p>

        </div>
        <div class="col-12 col-md-6 order-1 order-md-2">
            <img src="/assets/imgs/about-us.png" alt="" width="100%">
        </div>
    </div>
</div>
@endsection