@extends('front-end.layout.template')

@section('content')


<section id="contact" class="contact">
   

    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        
        <div class="col-lg-12 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="phonenumber (enter valid Mpesa number) " required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="course" id="course" placeholder="Course" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="amount" id="amount" placeholder="amount" required>
              </div>
            </div>
          
           
            <span class="alert-danger"> <small>Ensure you have sufficient funds</small></span>
           {{--  <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
            <div class="text-center"><button type="submit">Make payment</button></div>
          </form>

        </div>

      </div>

    </div>
    <br>
    <br>
    <br>
    <br>
  </section><!-- End Contact Section -->
@endsection