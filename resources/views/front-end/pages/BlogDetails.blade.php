@extends('front-end.layout.template')

@section('content')
    <div class="container fade-up">
        @forelse ( $postdetails as $post )
            <div class="section-title">
                <h2 class="mt-5">Blog</h2>
                <p> {{ $post->title }}</p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="100">
                <p> {!! $post->post !!}</p>

            </div>
            
                <div class="blog-dets-image">
                    @foreach ($postdetails->first()->postimages as $postimage)
                        <img src="{{ URL::asset('/storage/img/blog/' . $postimage->filename) }}" alt="{{ $post->title }}" />
                    @endforeach
                    {{-- <img src="{{ URL::asset('/storage/img/blog/' . $post->postimages->filename) }}"
    class="img-fluid" style="min-height:30vh;max-height:30vh" alt="{{$post->postimages->filename }}"/> --}}

                </div>


     
        @empty
            <div class="alert alert-danger">
                This post has no content yet
            </div>

        @endforelse
    </div>

@endsection
