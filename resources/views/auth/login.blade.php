@extends('front-end.layout.template')

@section('content')
<div id="logreg-forms">
    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </div>
        @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
                <p>{{ $message }}</p>
    </div>
@elseif($message = Session::get('fail'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
      </div>              
@endif 
    <form class="form-signin"  method="POST" action="{{ route('login') }}" enctype="multipart/form-data" autocomplete="off" >
       @csrf
      
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> {{ __('Login') }}</h1>
        {{-- <div class="social-login">
            <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
            <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
        </div> --}}
        
     <div>
        <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" >
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
        <div>
        <input type="password" id="inputPassword" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-email">
        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div style="display: flex;
                                    flex-direction:row;
                                    align-items:center;
                                    justify-content:center;
                        ">
        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                        </div>
        @if (Route::has('password.request'))
        <a class="btn btn-link" id="forgot_pswd" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    {{-- <a href="#" id="forgot_pswd">Forgot password?</a> --}}
        <hr>
        <!-- <p>Don't have an account!</p>  -->
        <button class="btn btn-primary btn-block" onclick="window.location='{{ route('register') }}'" type="button" id="btn-signup"><i  class="fa fa-user-plus" aria-hidden="true"></i> Sign up New Account</button>
        </form>
    </div>
{{-- <div class="container" style="margin-top:100px;margin-bottom:70px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
