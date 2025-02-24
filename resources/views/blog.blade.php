@extends('templates.front.main')
@section('customcss')
<link rel="stylesheet" href="/assets/css/front/blog.css">
@endsection
@section('body')
<div class="container-fluid breadcrumbs">
    <div class="container">
    <div class="row">
        <div class="col-12">
            <p style="margin:0px" class="py-3"><a href="/">Home</a> » <a href="#">Our Blogs</a></p>
        </div>
    </div>
    </div>
</div>
<section>
    <div class="container mt-5">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-12 col-md-4 mb-3">
                <div class="blog-single"><a href="/blog/{{ $blog->slug }}">
                        <img src="/blogs-thumb/{{ $blog->file }}" alt="{{ $blog->file }}" width="100%"
                            class="" style="height: 320px !important;object-fit: cover!important;margin-bottom:15px">
                        <p class="date">{{ $blog->created_at->format('j M, Y') }}</p>
                        <p class="fs-5 title mb-4 mt-2">{{ $blog->title }}</p>
                        
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <div id="navMenu" class="mt-5 text-center">
            @if($blogs->lastPage() > 1)
            {{ $blogs->links() }}
            @endif
        </div>
    </div>
</section>
@endsection