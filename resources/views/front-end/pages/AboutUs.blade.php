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
         <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content" style="padding: 3px 8px;  margin-top:30px">
          <h4> Ongoing Activities</h4>
          <ul>
            <li><i class="bi bi-check-circle" style="color: black"></i>In-Country Training</li>
            <li><i class="bi bi-check-circle" style="color: black"></i>Taylor made courses </li>
            <li><i class="bi bi-check-circle" style="color: black"></i> Incubation for women business( rabbits fish chicken ) . </li>
            <li><i class="bi bi-check-circle" style="color: black"></i>Shows and Exhibitions </li>
            <li><i class="bi bi-check-circle" style="color: black"></i> producing Mkulima TV programs </li>
            <li><i class="bi bi-check-circle" style="color: black"></i> School and Farmer group visits to the University </li>
            <li><i class="bi bi-check-circle" style="color: black"></i>Training in agribusiness value chains for horticultural crops </li>
          </ul>
          <h4 style="color: #dc140f"> Outstanding Achievements:</h4>
          <ul>
            <li><i class="bi bi-check-circle" ></i>Socioeconomic Empowerment of over 9000 women through the In-country training program.</li>
            <li><i class="bi bi-check-circle" ></i>Coordinating visits to the university by groups of farmers, students, and industrialists on learning mission.</li>
            <li><i class="bi bi-check-circle" ></i> Training various target groups in various fields e.g. the in-country training program for rural women leaders; youths; SMEs and persons with disabilities. </li>
            <li><i class="bi bi-check-circle" ></i>Seeking and promoting partnerships with industry for extension service delivery. </li>
            <li><i class="bi bi-check-circle" ></i> Initiating and participating in extension consultancy work. </li>
            <li><i class="bi bi-check-circle" ></i> School and Farmer group visits to the University </li>
            <li><i class="bi bi-check-circle" ></i>Development of extension information communication and education materials.</li>
          </ul>


         </div>
         
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>  Research Production and extension</h3>
            <p class="fst-italic">
            Background Information:
            </p>
            <p>
            As an arm of RPE Division Extension and Technology Transfer, seeks to link the results of training, research and innovation with the community. Initially the focus was on agriculture but over time, the focus has been expanding to 
            include urban, peri-urban and rural populations and socio-economic activities that constitute development.
            </p>
            <h4> Objectives</h4>
            <ul>
              <li><i class="bi bi-check-circle"></i>To disseminate and promote adoption of available research findings and technology for enhanced community development.</li>
              <li><i class="bi bi-check-circle"></i> To develop innovative extension training programs for various community target groups.</li>
              <li><i class="bi bi-check-circle"></i> Promote and enhance community services so as to keep the general public informed about the technologies services and resources available in the university. </li>
              <li><i class="bi bi-check-circle"></i> Create an interface between the university and the general public and to enhance strong and continuous contact between the university community and the general public. </li>
            </ul>

            <h4>Core activities</h4>
            <p>
              <ul>
                <li><i class="bi bi-check-circle" style="color: red"></i>Coordinating the participation of the university in shows, exhibitions and trade fairs.</li>
                <li><i class="bi bi-check-circle" style="color: red"></i> Coordinating visits to the university by groups of farmers, students, and industrialists on learning mission.</li>
                <li><i class="bi bi-check-circle" style="color: red"></i> Training various target groups in various fields e.g. the in-country training program for rural women leaders; youths; SMEs and persons with disabilities.</li>
                <li><i class="bi bi-check-circle" style="color: red"></i> Seeking and promoting partnerships with industry for extension service delivery. </li>
                <li><i class="bi bi-check-circle" style="color: red"></i> Initiating and participating in extension consultancy work. </li>
                <li><i class="bi bi-check-circle" style="color: red"></i> Development of extension information communication and education materials.</li>
              </ul>
             
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

@endsection