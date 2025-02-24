@extends('templates.admin.admin-main')
@section('title')
All Reviews
@endsection

@section('customcss')
<link rel="stylesheet" type="text/css" href="/assets/css/admin/rte_theme_default.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('body')
<x-admintopheader />
<div class="main-container">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background: #e5e5e5;">
                    <div class="container">
                        <div id="result"></div>
                        <div id="layoutdiv" style="position: absolute; width: 100%;z-index: 999;left: 0px;height:100%;">
                        </div>
                        <div id="getformdata"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- second section -->
    <div class="container mt-5">
        <div class="row bg-white mx-1">
            <div class="col-6 d-flex justify-content-start align-items-center">
                <p class="m-0 py-3 fs-5 fw-bold"> All Reviews</p>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">
                <form action="" style="position:relative" class="w-100">
                    <input type="text" placeholder="Search Review by Product Name,Rating & headline" name="search"
                        class="form-control w-100" value="{{$search}}">
                    <input type="submit" value="Search" style="position:absolute;right:0px;top:0px"
                        class="btn btn-primary">
                </form>
            </div>
        </div><br>
        <div class="row bg-white mx-1">
            <div class="col-12">
                <table class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 15%;">User Name</th>
                            <th style="width: 15%;">Product Name</th>
                            <th style="width: 8%;">Rating</th>
                            <th style="width: 15%;">Headline</th>
                            <th style="width: 15%;">Media</th>
                            <th style="width: 20%;">Review</th>
                            <th style="width: 18%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->rusername}}</td>
                            <td>{{$member->p_name}}</td>
                            <td>{{$member->starrating}}</td>
                            <td>{{$member->headline}}</td>
                            <td>
                                @if (Str::endsWith($member->mediafile, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <img src="/review/{{$member->mediafile}}" alt="{{$member->mediafile}}" width="100px">
                                @elseif (Str::endsWith($member->mediafile, ['mp4', 'ogg', 'webm']))
                                <video width="100" height="60px" controls>
                                    <source src="/review/{{$member->mediafile}}" type="video/mp4">
                                    <source src="/review/{{$member->mediafile}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                                @else
                                <p>Unsupported file format.</p>
                                @endif
                            </td>
                            <td>
                                <?php 
                                   echo implode(' ', array_slice(str_word_count($member->preview, 1), 0, 12));
                                   echo ".";
                                ?>
                            </td>
                            <td class="">
                                <a id="views" target="_blank" href="#" value="{{ $member->id }}"
                                    class="btn btn-success text-white reads views m-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="fa-solid fa-eye"></i></a>
                                <a href="#" class="btn btn-danger text-white delete m-1" value="{{ $member->id }}"><i
                                        class="fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">

                {{ $members->links('pagination::bootstrap-4') }}


            </div>
        </div>
    </div>

</div>
<script src="/assets/js/admin/all_plugins.js"></script>
<script src="/assets/js/admin/rte.js"></script>
<script>
var editor1cfg = {}
editor1cfg.toolbar = "basic";
var editor1 = new RichTextEditor("#div_editor1", editor1cfg);

function previewImage() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('imageInput');
    var file = fileInput.files[0];

    // Check if a file is selected
    if (file) {
        var reader = new FileReader();

        // Set up the reader onload event
        reader.onload = function(e) {
            // Create an image element
            var img = new Image();
            img.src = e.target.result;
            img.width = 150;
            img.classList.add('mb-3');

            // Append the image to the preview div
            preview.innerHTML = '';
            preview.appendChild(img);
        };

        // Read the file as a data URL
        reader.readAsDataURL(file);
    } else {
        // If no file is selected, clear the preview
        preview.innerHTML = '';
    }
}
</script>
<script>
$(document).ready(function() {
    $(".views").click(function(event) {
        event.preventDefault();
        $('#layoutdiv').show();
        var datas = $(this).attr('value');

        $.ajax({
            type: "GET",
            url: "/admin/get-review/" + datas,
            success: function(data) {
                // Function to determine if media is an image or a video
                function isImageOrVideo(mediafile) {
                    let imageExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
                    let videoExtensions = ["mp4", "ogg", "webm"];
                    let extension = mediafile.split('.').pop().toLowerCase(); // Get file extension

                    if (imageExtensions.includes(extension)) {
                        return "image";
                    } else if (videoExtensions.includes(extension)) {
                        return "video";
                    } else {
                        return "unknown"; // If file type is not recognized
                    }
                }

                let mediaType = isImageOrVideo(data.mediafile);
                let mediaHTML = "";

                if (mediaType === "image") {
                    mediaHTML = `<p><img src="/review/${data.mediafile}" width="80%" style="height:600px;object-fit:cover;margin:auto"></p>`;
                } else if (mediaType === "video") {
                    mediaHTML = `
                        <p>
                            <video width="80%" controls>
                                <source src="/review/${data.mediafile}" type="video/mp4">
                                <source src="/review/${data.mediafile}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </p>`;
                } else {
                    mediaHTML = `<p><strong>Media not supported.</strong></p>`;
                }

                // Injecting content into the modal
                $("#getformdata").html(`
                    <h2 class="text-center" style="margin-top:-30px">Review</h2><hr>
                    <p><strong>Review ID:</strong> ${data.id}</p>
                    <p><strong>Username:</strong> ${data.rusername}</p>
                    <p><strong>Rating:</strong> ${data.starrating}</p>
                    <p><strong>Review:</strong> ${data.preview}</p>
                    ${mediaHTML}
                `);
            },
            error: function(xhr, status, error) {
                console.log("Error fetching review:", error);
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
                url: "/admin/delete-reviews/" + datas,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Include CSRF token for Laravel protection
                },
                success: function(data) {
                    alert("Deleted Successfully!")
                    location.reload();
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Before Delete Please Remove Category From Products");
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