<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">


        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('frontend.index') }}" class="logo me-auto">
            <img src="{{ asset('storage/img/front-end/logo.jpg') }}" alt="" class="img-fluid">
            <h5 class="logo me-auto"><a href="{{ route('frontend.index') }}" style="padding:2px"> Research,
                    Production extension</a></h5>
        </a>


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="{{ Request::is('index*') ? 'active' : '' }}"
                        href="{{ route('frontend.index') }}">Home</a></li>
                <li><a class="{{ Request::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li><a class="{{ Request::is('courses*') ? 'active' : '' }}"
                        href="{{ route('courses') }}">Courses</a></li>

                <li><a class="{{ Request::is('my-courses*', 'subscribed-courses', 'course-content/{id}') ? 'active' : '' }}"
                        href="{{ route('my-courses') }}">My courses</a></li>

                <li class="dropdown"><a class="{{ Request::is('blog*') ? 'active' : '' }}"
                        href="{{ route('blog') }}"><span>Blog</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="{{ Request::is('faqs*') ? 'active' : '' }}"
                                href="{{ route('faqs') }}">F.A.Qs</a></li>

                    </ul>
                </li>
                <li><a class="{{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">Contact
                        us</a></li>
                @guest
                    @if (Route::has('login'))
                        <li class="dropdown"><a class="{{ Request::is('login*') ? 'active' : '' }}"
                                href="{{ route('login') }}"><span>{{ __('Login') }}</span> <i
                                    class="bi bi-chevron-down"></i></a>

                    @endif
                    <ul>
                        @if (Route::has('register'))
                            <li><a class="{{ Request::is('register*') ? 'active' : '' }}"
                                    href="{{ route('register') }}">{{ __('Register') }}</a></li>

                        @else

                            <li>
                                <a class="{{ Request::is('logout*') ? 'active' : '' }}" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>


                            <li>
                                <a id="" class="" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" style="color:#5fcf80" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endif

                    </ul>
                    </li>
                @endguest


            </ul>







            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav> <!-- .navbar -->





    </div>

</header><!-- End Header -->
