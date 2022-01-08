@extends('front-end.layout.template')

@section('content')

    <div id="logreg-forms">
        @if ($errors->any())
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
        <form class="form-signin" action="{{ route('log-in-check') }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            {{-- <div class="social-login">
            <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
            <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
        </div> --}}
            <div>
                <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Email address" required autocomplete="current-email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <input type="password" id="inputPassword" name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password" required
                    autocomplete="current-email">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block signup" onclick="window.location='{{ route('register') }}'" type="button"
                id=""><i class="fa fa-user-plus" aria-hidden="true"></i> Sign up New Account</button>
        </form>
    </div>

@endsection
