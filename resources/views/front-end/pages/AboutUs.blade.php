@extends('front-end.layout.template')

@section('content')


<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>About Us</h2>
        <p> </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{URL:: asset('/storage/img/front-end/about.jpg') }}" style="max-width:100%; max-height:60vh;" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>  Research Production and extension</h3>
            <p class="fst-italic">
             What we do:
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i></li>
              <li><i class="bi bi-check-circle"></i> </li>
              <li><i class="bi bi-check-circle"></i> </li>
            </ul>
            <p>
             
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

@endsection