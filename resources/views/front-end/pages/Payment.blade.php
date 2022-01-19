@extends('front-end.layout.template')

@section('content')


    <section id="contact" class="contact">


        <div class="container" data-aos="fade-up">

            <div class="row mt-5">


                <div class="col-lg-12 mt-5 mt-lg-0">

                    @foreach ($getcourses as $course)

                        <form action="{{ route('subscribe-pay') }}" method="post" role="form" id="payment-form"
                            class="php-email-form">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="course">User Id </label>
                                    <input type="text" class="form-control" name="user_id" id="user_id"
                                        value="{{ Auth::user()->id }}" required readonly>
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="course">Course Id </label>
                                    <input type="text" id="course" class="form-control" name="course_id" id="course_id"
                                        placeholder="{{ $course->name }}" value="{{ $course->id }} " required readonly>
                                    <small style="color:green">{{ $course->name }}</small>


                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <label for="course">Course Amount </label>
                                    <input type="text" class="form-control" name="amount" id="amount"
                                        value="{{ $course->amount }}" required readonly>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="text" id="phone" name="phone" class="form-control" id="phone"
                                        value="{{ Auth::user()->phone }}"
                                        placeholder="phonenumber (enter valid Mpesa number) " required>

                                </div>

                            </div>
                            <span class="alert-danger"> <small>Ensure you have sufficient funds, and the phonenumber is a
                                    valid Mpesa number</small></span>


                            {{-- <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
                           

                            <div class="text-center"><button id="makePayment" type="submit">Make payment</button></div>
                            <div class="spinner-grow" id="spin" role="status" style="display:none">
                              <span class="sr-only">Loading...</span>
                          </div>
                          </form>
                    @endforeach

                </div>

            </div>

        </div>
        <br>
        <br>
        <br>
        <br>
    </section><!-- End Contact Section -->

    <script type="text/javascript">
        isLoading = false;
        document.getElementById('makePayment').addEventListener('click', (event) => {

            spin = document.getElementById('spin');
            spin.style.display = "block";
            event.preventDefault();

            const requestBody = {
                amount: document.getElementById('amount').value,
                phone: document.getElementById('phone').value,


            }

            isLoading = true;

            axios.post('/customerMpesaSTKPush', requestBody)
                .then((response) => {
                    if (response.data.ResponseDescription) {
                        console.log(response.data);
                          if(response.data.ResponseCode == 0){
                           document.getElementById('payment-form').submit();
                         }
                         else{
                           window.location.replace("/");
                         } 

                    } else {

                    }
                }).catch((error) => {
                    console.log(error);
                }).finally(() => {
                  spin.style.display = "none";
           
                });
        })
    </script>
@endsection
