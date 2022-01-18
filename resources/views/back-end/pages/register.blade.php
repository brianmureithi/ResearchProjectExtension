@extends('back-end.layouts.app')

@section('content')

    <body class="signup-page">
        <div class="signup-box">
            <div class="logo">
                <a href="javascript:void(0);"><b>Research & Production</b> Extension</a>

            </div>
            <div class="card">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>

                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>

                @endif
                <div class="body">
                    <form id="sign_up" action="{{ route('save-user-route') }}" method="POST">
                        @csrf
                        <div class="msg">Register </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Name Surname" required
                                    autofocus value="{{ old('name') }}">
                                <span class="text-danger"> @error('name'){{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" placeholder="Email Address"
                                    value="{{ old('email') }}" required>
                                <span class="text-danger"> @error('email'){{ $message }} @enderror</span>

                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" minlength="6"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="confirm-password" minlength="6"
                                    placeholder="Confirm Password" required>
                                <span class="text-danger"> @error('password'){{ $message }} @enderror</span>

                            </div>
                        </div>

                        <button class="btn btn-block btn-lg bg-teal waves-effect" type="submit">SIGN UP</button>

                        <div class="m-t-25 m-b--5 align-center">
                            <a href="{{ URL::to('/admin') }}">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
