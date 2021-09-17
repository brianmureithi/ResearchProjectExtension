@extends('front-end.layout.template')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Start learning<br>Today</h1>
      <h2>We have an assortment of courses that will help you grow</h2>
      <a href="courses.html" class="btn-get-started">Get Started</a>
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

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{ asset('assets/front-end/img/course-1.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Web Development</h4>
                <p class="price">kes 169</p>
              </div>

              <h3><a href="course-details.html">Website Design</a></h3>
              <p></p>
              <a href="courses.html" class="get-started-btn">Subscribe</a>
              {{-- <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                  <span>Antonio</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div> --}}
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="{{ asset('assets/front-end/img/course-2.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Marketing</h4>
                <p class="price">kes 250</p>
              </div>

              <h3><a href="course-details.html">Search Engine Optimization</a></h3>
              <p></p>
              <a href="courses.html" class="get-started-btn">Subscribe</a>
            {{--   <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                  <span>Lana</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div> --}}
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="course-item">
            <img src="{{ asset('assets/front-end/img/course-3.jpg') }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Content</h4>
                <p class="price">kes 180</p>
              </div>

              <h3><a href="course-details.html">Copywriting</a></h3>
              <p></p>
              <a href="courses.html" class="get-started-btn">Subscribe</a>
             {{--  <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                  <span>Brandon</span>
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;85
                </div>
              </div> --}}
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>

    </div>
  </section><!-- End Popular Courses Section -->


@endsection