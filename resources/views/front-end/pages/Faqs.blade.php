@extends('front-end.layout.template')

@section('content')

  <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            {{-- <h2>Courses</h2> --}}
            <p>Frequently Asked Questions</p>
          </div>
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            

            <div class="faq-container">
              @forelse($showfaqs as $faq)
              <div class="faq-card">
                {{$faq->id}}.
            <div class="col-lg-12 col-md-6 col-sd-4 questionn">
              {{$faq->question}}
        </div>
       <div class="col-lg-12 col-md-6 col-sd-4 answerr">
        {{$faq->answer}}
        </div>
        </div>
        @empty
        <div class="alert alert-danger">
No Faqs uploaded yet, kindly contact us for any inquiries
        </div>

        @endforelse
        
        

    </div>
    </div>





     
      
    </div>




</section>


@endsection
