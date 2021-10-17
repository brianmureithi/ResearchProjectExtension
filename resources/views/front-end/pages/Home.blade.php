@extends('front-end.layout.template')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Start learning<br>Today</h1>
      <h2>We have an assortment of courses that will help you grow</h2>
      <a href="{{ route('courses') }}" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

   <!-- ======= Popular Courses Section ======= -->
   <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div>
    

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @forelse($showCourses as $Course)

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          
          <div class="course-item">

            <img src="{{URL:: asset('/storage/img/courseImages/'.$Course->image) }}" class="img-fluid" style="min-height:30vh;max-height:30vh"alt="{{ $Course->name }}">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $Course->name }}</h4>
                @if($Course->amount == 0)
                <p class="price" style="">Free</p>
                @else
                <p class="price">kes {{ $Course->amount }}</p>
                @endif
              </div>

              <h3><a href="#">{{ $Course->name }}</a></h3>
              <p>{{ $Course->description }}</p>
              @if($Course->amount > 0)
              <a href="{{ route('payment'), $Course->id }}" class="get-started-btn">Pay</a>
              @else
             {{--  <a href="{{ route('subscribe-free',$Course->id) }}" class="get-started-btn">Subscribe</a> --}}
            
             <a href="#"  onclick="   document.getElementById('subscribe-course-{{$Course->id}}').submit()" class="get-started-btn" 
             style="background:#fea103">Subscribe</a>
             
            
              @endif

             
             
               <a href="#" data-toggle="modal" data-target="#view-demo-{{$Course->id}}"  class="get-started-btn learn-more-btn"style="background:#1aa3e8 !important;">View Demo</a>
               <form action="{{ route('subscribe-free',$Course->id) }}" method="post" id="subscribe-course-{{$Course->id}}">
                @csrf
            
            </form>
            @include('front-end.pages.ViewDemo') 
            </div>
          </div>
        </div>
       
      
        @empty
        <div> <span class="alert alert-success">No Courses available</span>
                              
        </div>
       
        @endforelse

       {{--  @forelse($showCourses as $Course)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">         
          <div class="course-item">
                   
            <img src="{{URL:: asset('/storage/img/courseImages/'.$Course->image) }}" class="img-fluid" alt="...">
            
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $Course->name }}</h4>
                @if($Course->amount == 0)
                <p class="price">Free</p>
                @else
                <p class="price">kes {{ $Course->amount }}</p>
                @endif
              </div>

              <h3><a href="course-details.html">{{ $Course->name }}</a></h3>
              <p></p>
              @if($Course->amount > 0)
              <a href="courses.html" class="get-started-btn">Pay</a>
              @else
              <a href="courses.html" class="get-started-btn">Subscribe</a>
              @endif
              @empty
              <div> <span class="alert alert-success">No Courses available</span>
                                    
              </div>
         
             
            </div>
          </div>
        </div>
        @endforelse --}}

      </div>

    </div>
    
  </section><!-- End Popular Courses Section -->


@endsection