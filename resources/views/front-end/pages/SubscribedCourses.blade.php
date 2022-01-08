@extends('front-end.layout.template')

@section('content')
@if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </div>
                    @endif
@if ($message = Session::get('success-free'))
<div class="alert alert-success">
            <p>{{ $message }}</p>
</div>
@elseif($message = Session::get('fail-free'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
  </div>              
@endif 

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Courses</h2>
        <p>Subscribed Courses</p>
      </div>
    
<div class="row" data-aos="zoom-in" data-aos-delay="100">
@forelse($subcribedcourses as $coursesubscribed)
    @if(isset(Auth::user()->id) && Auth::user()->id == $coursesubscribed->user_id)
<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          
    <div class="course-item">

      <img src="{{URL:: asset('/storage/img/courseImages/'.$coursesubscribed->course->image) }}" class="img-fluid" style="min-height:30vh;max-height:30vh"alt="{{ $coursesubscribed->course->name }}">
      <div class="course-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4>{{ $coursesubscribed->course->name }}</h4>
          @if($coursesubscribed->course->amount == 0)
          <p class="price">Free</p>
          @else
          <p class="price">kes {{ $coursesubscribed->course->amount }}</p>
          @endif
        </div>

        <h3><a href="course-details.html">{{ $coursesubscribed->course->name}}</a></h3>
        <p>{{ $coursesubscribed->course->description }}</p>
        
              
        <a href="{{ route('view-course-content',$coursesubscribed->course_id)  }}" class="get-started-btn learn-more-btn" style="background:#5aa88a !important;">Course Content</a>
        
      </div>
    </div>
  </div>
  @else
  <div class="alert alert-danger">
  You need to be logged in to access this page
  </div>
  @endif


@empty
<div class="alert alert-danger">
No course subscribed at the moment

</div>
<div class="col-lg-6 col-md-4 col-sm-6">
 <a href="{{ route('courses') }}" class="get-started-btn">Go to courses</a>
</div>


@endforelse

</div>

</div>
    
</section>
@endsection