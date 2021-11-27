<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('frontend.index') }}" class="logo me-auto">
        <img src="{{ asset('storage/img/front-end/logo.jpg') }}" alt="" class="img-fluid">
        <h5 class="logo me-auto"><a href="{{ route('frontend.index') }}">Research, Production, & extension</a></h5>
      </a>
  

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{ route('frontend.index') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('courses') }}">Courses</a></li>
         
          <li><a href="{{ route('my-courses') }}">My courses</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact us</a></li>
          @guest
          @if (Route::has('login'))
          <li class="dropdown"><a href="{{ route('login') }}"><span>{{ __('Login') }}</span> <i class="bi bi-chevron-down"></i></a>
           @endif
            <ul>
              @if (Route::has('register'))
              <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
              @endif
              @else
             
            <li>
              <a class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  </li>

                  <li class="">
                    <a id="" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" style="color:#5fcf80" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
    
                  {{--   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                    </div> --}}
                </li>
            
         
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
         
          </li>
          <li><a href="contact.html">Contact</a></li> --}}
        </ul>
        
        
      
        @endguest
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ route('courses') }}" class="get-started-btn">Get Started</a>

    </div>
   
  </header><!-- End Header -->
