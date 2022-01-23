@extends('front-end.layout.template')

@section('content')
    <!-- ======= Hero Section ======= -->
    @if ($message = Session::get('success-newsletter'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif($message = Session::get('fail-newsletter'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('success-subscribe'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif($message = Session::get('fail-subscribe'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Start learning<br>Today</h1>
            <h2>We have an assortment of courses that will help you grow</h2>
            <a href="{{ route('courses') }}" class="btn-get-started">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Popular Courses Section ======= -->
    <section id=" " class="courses ">
        <div class="cont position-relative col-md-12 col-sm-12" data-aos="fade-up">

            <div class="section-title">
                <h2>Courses</h2>
                <p>Popular Courses</p>
            </div>


            <div class="home" data-aos="zoom-in" data-aos-delay="100">
               
                @forelse($showCourses as $Course)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                   
                        <div class="course-item">

                            <img src="{{ URL::asset('/storage/img/courseImages/' . $Course->image) }}"
                                class="img-fluid" style="min-height:30vh;max-height:30vh" alt="{{ $Course->name }}">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{ $Course->name }}</h4>
                                    @if ($Course->amount == 0)
                                        <p class="price" style="">Free</p>
                                    @else
                                        <p class="price">kes {{ $Course->amount }}</p>
                                    @endif
                                </div>

                                <h3><a href="#">{{ $Course->name }}</a></h3>
                                <p>{{ $Course->description }}</p>
                              
                                @if ($Course->amount > 0)
                                    <a href="{{route('payment',$Course->id)}}" class="get-started-btn">Pay</a>
                             
                                @else
                                    {{-- <a href="{{ route('subscribe-free',$Course->id) }}" class="get-started-btn">Subscribe</a> --}}

                                    <a href="#"
                                        onclick="document.getElementById('subscribe-course-{{ $Course->id }}').submit()"
                                        class="get-started-btn" style="background:#b3a632;color:#fff;cursor:pointer;width:100px">Subscribe</a>
                                      {{--   b3a632 --}}

                                @endif

                            
                                <a  data-toggle="modal" data-target="#view-demo-{{ $Course->id }}" id="btn" class="get-started-btn learn-more-btn" style="background:#1aa3e8 !important;cursor:pointer;color:#fff">View
                                    Demo</a>
                                   
                                    
                              
                              
                            </div>
                        </div>
                    </div> 
                    @include('front-end.pages.ViewDemo')
                     <form action="{{ route('subscribe-free', $Course->id) }}" method="post"
                        id="subscribe-course-{{ $Course->id }}">
                        @csrf

                    </form>

                @empty
                    <div> <span class="alert alert-success">No Courses available</span>

                    </div>

                @endforelse
             

                {{-- @forelse($showCourses as $Course)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">         
          <div class="course-item">
                   
            <img src="{{URL:: asset('/storage/img/courseImages/'.$Course->image) }}" class="img-fluid" alt="...">
            
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $Course->name }}</h4>
                @if ($Course->amount == 0)
                <p class="price">Free</p>
                @else
                <p class="price">kes {{ $Course->amount }}</p>
                @endif
              </div>

              <h3><a href="course-details.html">{{ $Course->name }}</a></h3>
              <p></p>
              @if ($Course->amount > 0)
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
    <div id="popup">
<div class="contentBox">
<div id="closedd">

</div>
<div class="imgBox">
    <img src="{{ asset('storage/img/front-end/logo.jpg') }}">
</div>
<div class="content">
    <div>
    <h3>Welcome, Subscribe to our newsletter</h3>
    <h5>Stay informed</h5>
    <br>
    <form action="{{ route('newsletter-visitor') }}" method="post">
        @csrf
        <div style="align-text:left;"> <label for="email">Email:</label>
            <input id="email" type="email" placeholder="Enter email" class="form-control email" name="email"></div>
<div class="cat">
<label for="category">Category:</label>
<select id="category" placeholder="Enter category" class="form-control catpop" name="category">
@foreach ($showsubcourse as $cs)

<option value="{{$cs->name}}"> {{$cs->name}} </option>
@endforeach
</select>
</div>
       {{--  <div> <label for="category">Category:</label><input id="category" placeholder="Enter category"type="category" class="form-control" name="category"></div>
        
     --}}  
     <div class="submitBtn">
     <input type="submit" id="subscribe" value="Subscribe">
     </div>
      </form>
    </div>
<div>

</div>
<div>

</div>
    </form>

</div>
</div>
    </div>
    <div class="modal fade" id="admodal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="carousel slide" data-ride="carousel" id="adCarousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <h1>This is Slide 1</h1>
                                <h5>Same is shown of text, but you can use any html content imges, videos, etc inside this
                                    box</h5>
                            </div>
                            <div class="item">
                                <h1>This is Slide 2</h1>
                                <h5>You can choose to have carousal or just a single html content</h5>
                            </div>
                            <div class="item">
                                <h1>This is Slide 3</h1>
                                <h5>Carousal is a good way to show ads, to keep user engaged.</h5>
                            </div>
                            <div class="item">
                                <h1>This is Slide 4</h1>
                                <h5>Okay</h5>
                            </div>
                            <div class="item">
                                <h1>This is Slide 5</h1>
                                <h5>Enough, Done !</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">No, Close this popup now.</button><br
                        class="visible-xs">
                    <br class="visible-xs">
                    <button class="btn btn-success" type="button">Yes, I would love to click on Ads.</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script  type="text/javascript">
const popup = document.getElementById('popup');
  const close= document.getElementById('closedd');
  const subscribebtn=document.getElementById('subscribe');

window.onload = function(){
  setTimeout(function(){
    const popupstate = JSON.parse(sessionStorage.getItem("popupClosed"));
    console.log(popupstate);
    if(popupstate == null){
    popup.style.display = "block";
    popup.style.opacity = "1";
  }
  else if(popupstate == "true"){
    popup.style.display = "none";
    popup.style.opacity = "0";
  }
 
 

  }, 2000)
}

close.addEventListener('click',() => {

  popup.style.display = "none";
  sessionStorage.setItem("popupClosed",true)
});
subscribebtn.addEventListener('click', ()=>{
  sessionStorage.setItem("popupClosed",true);
});

</script>
   


@endsection
