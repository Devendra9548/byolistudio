@extends('templates.admin.admin-main')
@section('title')
Home Page
@endsection

@section('customcss')
<link rel="stylesheet" type="text/css" href="/assets/css/admin/rte_theme_default.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('body')
<x-admintopheader />
<div class="main-container">

    <!-- second section -->
    <div class="container mt-5">
        <div class="row bg-white mx-1">
            <div class="col-6 d-flex justify-content-start align-items-center">
                <p class="m-0 py-3 fs-5 fw-bold"> Home Page - Hero Section</p>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">

            </div>
        </div><br>
        <div class="row bg-white mx-1 pt-5">
            <div class="col-12">
                <form action="" id="addHome" enctype="multipart/form-data" class="edit-blogs">
                    @csrf
                    <input type="hidden" name="id" id="hiddenid" value="{{ $members->id }}">
                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 1 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide1" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide1 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 2 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide2" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide2 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 3 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide3" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide3 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 4 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide4" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide4 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 5 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide5" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide5 }}" alt="" width="150px" class="mb-3"></div>


                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 6 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide6" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide6 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="title" class="h6 mt-3" style="font-size:22px">Slide 7 (Size: 1920*694)</label>
                    <input type="file" class="form-control" name="slide7" id="imageInput" accept="image/*"
                        onchange="previewImage()">
                    <div id="preview" style="width:100%;overflow:hidden;margin-top:20px"><img
                            src="/home/{{ $members->slide7 }}" alt="" width="150px" class="mb-3"></div>

                    <label for="video" class="h6 mt-3" style="font-size:22px">Youtube Video ID</label><a href="/assets/imgs/youtube-id.jpeg" target="_blank" class="btn btn-primary" style="font-size: 12px !important;margin-top: -10px;margin-left: 10px;
}">Help?</a>
                    <input type="text" name="video" class="form-control py-3 h6" placeholder="Title here..."
                        value="{{ $members->video }}">
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/{{ $members->video }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                    <br><br>

                    <label for="selecthero" class="h6 mt-3" style="font-size:22px">Select Media</label>
                    <select name="selecthero" id="" class="form-control">
                        @if($members->selecthero == 0)
                        <option value="0">Image Slider</option>
                        <option value="1">Youtube Video</option>
                        @else
                        <option value="1">Youtube Video</option>
                        <option value="0">Image Slider</option>
                        @endif
                    </select><br>



                    <br><br><br><br>
                    <div class="fixedbtn-2 d-flex">
                        <input type="submit" class="btn btn-primary read-btn" value="Update Page">
                        <img src="/assets/imgs/spinner.gif" alt="" width="26px" id="CtSpinner">
                        <p id="messagehere" class="ps-3 text-success">Updated Successfully</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="/assets/js/admin/all_plugins.js"></script>
<script src="/assets/js/admin/rte.js"></script>

<script>
$(document).ready(function() {
    $("#addHome").submit(function(event) {
        event.preventDefault();
        document.querySelector("#CtSpinner").style.display = "block";
        var formData = new FormData(this);
        var hiddenid = document.querySelector("#hiddenid").value;
        $.ajax({
            type: "POST",
            url: "/admin/update-home",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res == true) {
                    $("#addHome")[0].reset();
                    document.querySelector("#messagehere").style.display = "block";
                    window.location.reload('/admin/all-homes/1');
                } else {
                    alert("Error!" + res);
                }
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(".delete").click(function(event) {
        event.preventDefault();
        $('#layoutdiv').hide();
        var data = confirm("Are You Sure You Want to Delete It?");
        if (data == true) {
            var datas = $(this).attr('value');
            $.ajax({
                type: "DELETE",
                url: "/admin/delete-blog/" + datas,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Include CSRF token for Laravel protection
                },
                success: function(data) {
                    alert("Deleted Successfully!")
                    location.reload();
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Before Delete Please Remove Category From Blogs");
                }
            });
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $(".seotag").click(function(event) {
        event.preventDefault();
        $('#layoutdiv').hide();
        var datas = $(this).attr('value');
        $.ajax({
            type: "GET",
            url: "/admin/post-seo/" + datas,
            success: function(data) {
                $("#getformdata").html(data);

            }
        });
    });
});
</script>

</body>
@endsection