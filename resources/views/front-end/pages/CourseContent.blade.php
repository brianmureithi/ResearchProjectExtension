@extends('front-end.layout.template')

@section('content')

 <!-- ======= Breadcrumbs ======= -->
 @forelse($coursecontent as $coursecontent)
 <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
      <h2>{{ $coursecontent->name }}</h2>
      <p> {{ $coursecontent->description }}</p>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Cource Details Section ======= -->
  <section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8">
          <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
          <h3>Videos</h3>
         
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Trainer</h5>
            <p><a href="#">Brian murithi</a></p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Fee</h5>
            <p>{{ $coursecontent->amount }}</p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Duration</h5>
            <p>30</p>
          </div>

          {{-- <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Schedule</h5>
            <p>5.00 pm - 7.00 pm</p>
          </div> --}}

        </div>
      </div>

    </div>
  </section><!-- End Cource Details Section -->
  @empty
  

  <div class="alert alert-danger">
<p>There are currently no videos for this course, please wait for admin to upload, thankyou.</p>
  </div>
  @endforelse
@endsection