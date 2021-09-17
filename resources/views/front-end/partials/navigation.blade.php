<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('frontend.index') }}" class="logo me-auto">
        <img src="{{ asset('storage/img/front-end/logo.jpg') }}" alt="" class="img-fluid">
        <h5 class="logo me-auto"><a href="{{ route('frontend.index') }}">Research Production, extension</a></h5>
      </a>
  

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{ route('frontend.index') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('courses') }}">Courses</a></li>
          <li><a href="#">Payment</a></li>
          <li><a href="#">My courses</a></li>
          <li><a href="{{ route('contact') }}">Contact us</a></li>

          <li class="dropdown"><a href="{{ route('sign-in') }}"><span>Sign in</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('register') }}">Register</a></li>
              {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('courses') }}" class="get-started-btn">Get Started</a>

    </div>
   
  </header><!-- End Header -->
