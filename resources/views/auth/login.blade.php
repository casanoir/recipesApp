@extends('layouts.app')

@section('content')
<div class="container h-100" id="loginContainer">
    <div class="row py-5 h-100">
        <div class="col-4 pt-4 loginCol" id="loginForm">
            <div class="container g-0">
                <div class="row">
                    <div class="col-12 g-0">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <img  src="/images/logo.png" class="m-2 w-50"/>
                        </a>
                        <a href="{{ route('about') }}" class="float-end m-4">{{ __('About us') }}</a>
                    </div><!--col-12-->
                </div><!--row-->

                <div class="row mt-5">
                    <div class="col-12 g-0 d-flex justify-content-center">
                        <h1>WELCOME</h1><br/>
                    </div><!--col-12-->
                </div><!--row-->

                <div class="row mt-2">
                    <div class="col-12 g-0 d-flex justify-content-center">
                        <p>
                            Please enter your email and password to login
                        </p>
                    </div><!--col-12-->
                </div><!--row-->

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mt-3 mx-3" id="loginFirstInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-envelope ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!--col-10-->
                    </div><!--row-->

                    <div class="row mt-2 mx-3" id="loginLastInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-key ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div><!--col-10-->
                    </div><!--row-->

                    <div class="row mt-2 mx-3">
                        <div class="col-12 g-0">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div><!--col-12-->
                    </div><!---row-->

                    <div class="row mt-4 mx-3">
                        <div class="col-5 g-0">
                            <button type="submit" class="btn btn-primary w-100" id="loginBtnLogin">
                                {{ __('Login') }}
                            </button>
                        </div><!--col-5-->
                        <div class="col-2"></div>
                        <div class="col-5 g-0">
                            <a class="btn btn-primary w-100" id="loginBtnCreate" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div><!--col-5-->
                    </div><!--row-->

                    <div class="row mt-4 mx-3">
                        <div class="col-12 g-0">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div><!--col-12-->
                    </div><!--row-->
                </form>
            </div><!--container-->
        </div><!--col-4-->
        <div class="col-8 loginCol" id="loginImg">
          
        </div><!--col-8-->
    </div><!--row-->
</div><!--container-->
@endsection