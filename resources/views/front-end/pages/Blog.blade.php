@extends('front-end.layout.template')

@section('content')
 

    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <h2 class="mt-5">Blog</h2>
        <p>Featured Posts</p>
    </div>
</div>
    <main id="main">

        
   
   {{--  <div class="blog-content d-flex align-items-stretch">
        <div class="card  col-lg-4">
        <div class="blog-image card-img">
  @foreach ($findpost->first()->postimages as $postimage) 

<img class="blog-image" src="{{URL::asset('/storage/img/blog/'.$postimage->filename)}}" alt="Blog image"/>

 @endforeach 
        </div>
    </div>
    
        <div class="blog-text col-lg-8">
        <div class="blog-title mt-2">
    <h4>{{$post->title}}</h4>
        </div>
        <div class="blog-body">
        <p> {!! $post->post !!}</p>
             </div>
             <button class="btn-primary read-more ms-1" onclick="window.location='{{route('blog-details',$post->id)}}'">Read More</button>
      
        </div>
    </div> --}}
     <!-- ======= Events Section ======= -->
     <section id="events" class="events">
        <div class="container" data-aos="fade-up">
        
          <div class="row">
            @forelse ($findpost as $post )
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card">
                <div class="card-img">
                    @if (count($post->postimages) > 0 ) 
                  <img src="{{URL::asset('/storage/img/blog/'.$post->postimages[0]->filename)}}"  style="width:100%;" alt="..."/>
                  @endif 
                </div>
                <div class="card-body  blog-text ">
                  <h5 class="card-title"><a href="{{route('blog-details',$post->id)}}">{{$post->title}}</a></h5>
                 
                  <p class="fst-italic text-center">{{$post->created_at->diffForHumans()}}</p>
                  <div class="blog-body">
                  <p class="card-text">{!!$post->post!!}</p>
                  </div>
                  <button class="read-more ms-1" onclick="window.location='{{route('blog-details',$post->id)}}'">Read More</button>
      
                </div>
              </div>
            </div>
            @empty
            <div class="alert alert-danger">
                No Post available
            </div> 
         @endforelse
           
          </div>
  
        </div>
      </section><!-- End Events Section -->

   
</main>


@endsection
