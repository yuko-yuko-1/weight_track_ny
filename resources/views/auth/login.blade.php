@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endpush

@section('content')
<body>



<div class="container-fluid">
    <div class="row justify-content-center">



            <div class="login-card container-fluid">
                <div class="col-6">

                    <div class="image-container">
                        <img src="{{asset('images/login.weightscale.png')}}" alt="login" >
                    </div>
                </div>


                <div class="form-container text-center">

                    <h4 class="login-text">{{ __('Login') }}</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div>
                            <label for="email" class="col-md-4 text-center login-text-p">{{ __('Email Address') }}</label>
                            </div>
                            <div class="col-md-8 mx-auto">
                                <input id="email" type="email" class="login-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div>
                                <label for="password" class="col-md-4  text-center login-text-p">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-8 mx-auto">
                                <input id="password" type="password" class="login-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-check ">
                            <div class="col-md-12 form-rem">
                                <div class="form-check login-text-p ">
                                    <input class="form-check-input" type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Password') }}
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>
<br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link login-text-p " href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link login-text-p" href="{{ route('password.request') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
</body>
@endsection
