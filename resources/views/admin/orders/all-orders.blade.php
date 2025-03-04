@extends('templates.admin.admin-main')
@section('title')
All Orders
@endsection

@section('customcss')
<link rel="stylesheet" type="text/css" href="/assets/css/admin/rte_theme_default.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('body')
<x-admintopheader />
<div class="main-container">
    <x-ordermenu />

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Actions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background: #e5e5e5;">
                    <div id="result"></div>
                    <div id="layoutdiv" style="position: absolute; width: 100%;z-index: 999;left: 0px;height:100%;">
                    </div>
                    <div id="getformdata"></div>
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
            <div class="col-12 d-flex justify-content-between align-items-center">
                <p class="m-0 py-3 fs-5 fw-bold"> All Orders</p>
                <p class="m-0 py-3 fs-5 pe-3 fw-bold"> Total Orders: <span
                        class="text-success" id="totalnumberOfOrders">0</span></p>
            </div>
        </div><br>
        <div class="row bg-white mx-1">
            <div class="col-12">
                <table class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Orderid</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Pay Status</th>
                            <th>Purchased Date</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                           $totalnumberOfOrders=0;
                        ?>
                        @foreach($orders as $order)
                        @if($order->paymethod == "COD" || ($order->payment_id != '' && $order->paystatus == 2 &&
                        $order->rzp_order_id != ''))
                        <tr>
                            <?php
                            $totalnumberOfOrders++;
                            ?>
                            <td class="">#{{ $order->orderid }}</td>
                            <td class="">{{ $order->username }}</td>
                            <td style="color:green;font-weight:bold">Rs. {{ $order->amount }}</td>
                            <td>{{ $order->paymethod }}</td>
                            <td class="">
                                @if($order->paystatus == 2)
                                <span class="text-success fw-bold">Success</span>
                                @else
                                <span class="text-danger fw-bold">Failed</span>
                                @endif
                            </td>
                            <td class="">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:ia') }}</td>
                            <td>
                                <a href="/admin/all-orders/{{ $order->orderid }}" class="btn btn-primary">View More</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach


                    </thead>

                </table>
                <input type="hidden" value="{{ ($totalnumberOfOrders) }}" id="totalnumberOfOrdershidden" > 
            </div>
        </div>
    </div>

</div>
<script src="/assets/js/admin/all_plugins.js"></script>
<script src="/assets/js/admin/rte.js"></script>

<script>
    var totalnumberOfOrdershidden = document.querySelector("#totalnumberOfOrdershidden").value;
    document.querySelector("#totalnumberOfOrders").innerHTML = totalnumberOfOrdershidden;
    
</script>
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
<!-- 
<script>
$(document).ready(function() {
    $(".views").click(function(event) {
        event.preventDefault();
        $('#layoutdiv').show();
        var datas = $(this).attr('value');

        $.ajax({
            type: "GET",
            url: "/admin/edit-blog/" + datas,
            success: function(data) {
                $("#getformdata").html(data);

            }
        });


    });
});
</script> -->

<script>
$(document).ready(function() {
    $(".edit").click(function(event) {
        event.preventDefault();
        $('#layoutdiv').hide();
        var datas = $(this).attr('value');

        $.ajax({
            type: "GET",
            url: "/admin/edit-blog/" + datas,
            success: function(data) {
                $("#getformdata").html(data);

            }
        });
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