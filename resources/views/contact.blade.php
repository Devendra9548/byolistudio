@extends('templates.front.main')
@section('customcss')
<link rel="stylesheet" href="/assets/css/front/contact.css" />
@endsection
@section('body')
<div class="container-fluid breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p style="margin:0px" class="py-3"><a href="/">Home</a> » <a href="#">Contact Us</a></p>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center info-card">
            <h1 class="fs-3 fw-bold">Our Dedicated Teams Are Ready To Help.</h1>
            <p class="fs-5 mb-3">Byoli Studio Office Address</p>
            <address class="text-center"> 22/94, Haldwani, Nainital, Uttarakhand, 263139</address>
             <p class="pb-2"><a href="tel:+919756605898">Tel: +91 97566 05898</a></p>
             <p class="py-2 text-black">( 10AM-6PM Monday to Saturday )</p>
             <p class="py-2"><a href="mailto:byolidm@gmail.com"> Email : byolidm@gmail.com</a></p>
             <h2 class="fs-3 fw-bold mt-3" style="font-family:Inria Serif!important;">For Bulk Orders please contact.</h2>
             <p class="pb-2"><a href="tel:+919756605898">Tel: +91 97566 05898</a></p>
             <p class="pb-2"><a href="tel:+919149187091">Tel: +91 91491 87091</a></p>
        </div>
        
    </div>
    <div class="row mt-5 second-row">
         <div class="col-12 col-md-3"></div>
           <div class="col-12 col-md-6">
        <p class="text-center px-1 pb-4">Feel free to share your questions, concerns, or anything you'd like to know, and our team will promptly reach out to you. We're here to assist you and ensure you have all the information and support you need.</p>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Full Name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" id="email" placeholder="Email address" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
            </div>
            <div class="mb-3">
                <label class="form-label" for="textarea">Message</label>
                <textarea name="message" id="textarea" rows="5" class="form-control">Write Message...</textarea>
            </div>
            <button type="submit" class="btn btn-secondary text-white d-block w-100">Send Message</button>
            <p class="text-left" style="font-size: 12px !important;margin-top: 10px !important;">By submitting, you agree to receive marketing messages at the phone number or email provided. Message and data rates may apply. View our privacy policy and terms of service for more info.</p>
        </form>
    </div>
    <div class="col-12 col-md-3"></div>
    
</div>
</div>
@endsection