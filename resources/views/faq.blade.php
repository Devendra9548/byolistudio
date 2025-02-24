@extends('templates.front.main')
@section('customcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<style>
#main {
    margin: 50px 0;
}

#main #faq .card {
    margin-bottom: 30px;
    border: 0;
}

#main #faq .card .card-header {
    border: 0;
    -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
    box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
    border-radius: 2px;
    padding: 0;
}

#main #faq .card .card-header .btn-header-link {
    color: #fff;
    display: block;
    text-align: left;
    background: #8a8a8a;
    color: #FFF;
    padding: 20px;
}

#main #faq .card .card-header .btn-header-link:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    float: right;
}

#main #faq .card .card-header .btn-header-link.collapsed {
    background: #FFF;
    color: #000;
}

#main #faq .card .card-header .btn-header-link.collapsed:after {
    content: "\f106";
}

#main #faq .card .collapsing {
    background: #F9F9F9;
    line-height: 30px;
}

#main #faq .card .collapse {
    border: 0;
}

#main #faq .card .collapse.show {
    background: #F9F9F9;
    line-height: 30px;
    color: #222;
}
</style>
@endsection
@section('body')
<div class="container-fluid breadcrumbs">
    <div class="row row-2">
        <div class="col-12">
            <p style="margin:0px" class="py-3"><a href="/">Home</a> » <a href="#">F.A.Q</a></p>
        </div>
    </div>
</div>
<div id="main">
    <div class="container">
        <h2 class="mb-3">Frequently Asked Questions</h2>
        <div class="accordion" id="faq">
            <div class="card">
                <div class="card-header" id="faqhead1">
                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                        aria-expanded="true" aria-controls="faq1">1. What is Byoli Studio?</a>
                </div>

                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                    <div class="card-body">
                        Byoli Studio is a brand dedicated to preserving the rich textile heritage of
                        <strong>Uttarakhand</strong>. We
                        specialize in handcrafted <strong>Pichora, designer lehengas, and Kumaoni traditional
                            attire</strong>, blending
                        tradition with modern elegance.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqhead2">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                        aria-expanded="true" aria-controls="faq2">2. What is a Pichora, and why is it special?</a>
                </div>

                <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                    <div class="card-body">
                        Pichora is a <strong>traditional bridal drape</strong> worn by Kumaoni brides, symbolizing
                        blessings, prosperity,
                        and cultural heritage. It is hand-printed with auspicious motifs like the <strong>Swastik, Sun,
                            and
                            Kalash</strong>, making it a sacred and cherished part of Kumaoni weddings.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead3">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                        aria-expanded="true" aria-controls="faq3">3. Can I customize my bridal outfit?</a>
                </div>

                <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                    <div class="card-body">
                        Absolutely! We specialize in custom-made bridal wear, ensuring that every detail matches your
                        vision. Whether it’s a traditional Pichora, a designer lehenga, or a customized Kumaoni outfit,
                        we create exactly what you desire.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead4">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                        aria-expanded="true" aria-controls="faq4">4. Do you offer ready-to-wear outfits or only custom
                        designs?</a>
                </div>

                <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                    <div class="card-body">
                        We offer both! You can explore our <strong>ready-to-wear collection</strong> or opt for a
                        <strong>fully customized outfit</strong>
                        tailored to your preferences.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead5">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                        aria-expanded="true" aria-controls="faq5">5. Do you ship outside Uttarakhand?</a>
                </div>

                <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                    <div class="card-body">
                        Yes, we offer <strong>nationwide and international shipping</strong> so that you can embrace the
                        beauty of
                        Uttarakhand’s culture wherever you are.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead6">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
                        aria-expanded="true" aria-controls="faq6">6. What is the estimated delivery time for custom
                        orders?</a>
                </div>

                <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                    <div class="card-body">
                        Custom orders usually take <strong>3 to 6 weeks</strong>, depending on the design’s complexity.
                        We recommend
                        placing orders well in advance, especially for weddings.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead7">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq7"
                        aria-expanded="true" aria-controls="faq7">7. Do you provide outfit recommendations based on my
                        wedding theme?</a>
                </div>

                <div id="faq7" class="collapse" aria-labelledby="faqhead7" data-parent="#faq">
                    <div class="card-body">
                        Yes! We love helping brides <strong>find the perfect outfit</strong> that matches their wedding
                        theme, personal
                        style, and cultural traditions.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead8">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq8"
                        aria-expanded="true" aria-controls="faq8">8. What makes Byoli Studio different from other
                        brands?</a>
                </div>

                <div id="faq8" class="collapse" aria-labelledby="faqhead8" data-parent="#faq">
                    <div class="card-body">
                        Byoli Studio is not just about fashion—it’s about heritage, emotions, and timeless elegance. We
                        blend traditional Kumaoni craftsmanship with modern designs, ensuring that every bride feels
                        connected to her roots while embracing contemporary style.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead9">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq9"
                        aria-expanded="true" aria-controls="faq9">9. Do you offer outfits for other occasions besides
                        weddings?</a>
                </div>

                <div id="faq9" class="collapse" aria-labelledby="faqhead9" data-parent="#faq">
                    <div class="card-body">
                        Yes! We offer <strong>festive wear, cultural attire, and elegant traditional outfits</strong>
                        for special
                        occasions like engagements, family functions, and celebrations.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead10">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq10"
                        aria-expanded="true" aria-controls="faq10">10. Can I customize my Pichora design?</a>
                </div>

                <div id="faq10" class="collapse" aria-labelledby="faqhead10" data-parent="#faq">
                    <div class="card-body">
                        Absolutely! We offer customization for Pichoras, allowing brides to add <strong>personal
                            touches</strong> while keeping the essence of tradition intact.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead11">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq11"
                        aria-expanded="true" aria-controls="faq11">11. Do you have a physical store where I can
                        visit?</a>
                </div>

                <div id="faq11" class="collapse" aria-labelledby="faqhead11" data-parent="#faq">
                    <div class="card-body">
                        Yes! You can visit our studio: <strong>Nainital Road, Opposite Saras Market, Near Kalusai
                            Mandir, Haldwani, Uttarakhand, India.</strong>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead12">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq12"
                        aria-expanded="true" aria-controls="faq12">12. How do I contact you for further inquiries?</a>
                </div>

                <div id="faq12" class="collapse" aria-labelledby="faqhead12" data-parent="#faq">
                    <div class="card-body">
                        You can reach us through: <br>
                        Contact Number: 7505612414 <br>
                        Studio Location: Nainital Road, Opposite Saras Market, Near Kalusai Mandir, Haldwani,
                        Uttarakhand, India.

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection