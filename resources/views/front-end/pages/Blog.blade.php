@extends('front-end.layout.template')

@section('content')
 

    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <h2 class="mt-5">Blog</h2>
        <p>Featured Posts</p>
    </div>
    <div class="blog-content">
        <div class="blog-image col-lg-4">
<img class="blog-image" src="{{ URL::asset('/storage/img/pigfarming.jpg') }}" alt="Blog image"/>

        </div>
        <div class="blog-text col-lg-8">
        <div class="blog-title mt-2">
    <h4>Blog title</h4>
        </div>
        <div class="blog-body">
            <p> So this will be the blog body. A short description of the  blog post/</p>
            <button class="btn-primary read-more ms-1" onclick="window.location='{{route('blog-details')}}'">Read More</button>
        </div>
        </div>
    </div>
</div>
@endsection
