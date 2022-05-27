@extends('layouts.app')

@section('content')
<div class="container h-100" id="loginContainer">
    <div class="row py-5 h-100">
        <div class="col-4  pt-4 loginCol" id="loginForm">
            <div class="container g-0">
                <div class="row">
                    <div class="col-12 g-0">
                        <img src="/images/logo.png" class="m-2 w-50"/>
                        <a href="{{ route('about') }}" class="float-end m-4">{{ __('About us') }}</a>
                    </div><!--col-12-->
                </div><!--row-->

                <div class="row mt-5">
                    <div class="col-12 g-0 d-flex justify-content-center">
                        <h1>REGISTER</h1><br/>
                    </div><!--col-12-->
                </div><!--row-->

                <div class="row mt-2">
                    <div class="col-12 g-0 d-flex justify-content-center">
                        <p class="px-4">
                            Please enter your name, email, password and then confirm your password to register
                        </p>
                    </div><!--col-12-->
                </div><!--row-->

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mt-3 mx-3" id="loginFirstInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-user ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!--col-10-->
                    </div><!--row-->

                    <div class="row mt-2 mx-3 loginMiddleInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-envelope ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!--col-10-->
                    </div><!--row-->

                    <div class="row mt-2 mx-3 loginMiddleInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-key ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!--col-12-->
                    </div><!---row-->

                    <div class="row mt-2 mx-3"  id="loginLastInput">
                        <div class="col-2 g-0 d-flex align-items-center loginInputStart">
                            <i class="fas fa-key ms-2"></i>
                        </div><!--col-2-->
                        <div class="col-10 g-0 loginInputEnd">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="comfirm password" required autocomplete="new-password">
                            </div>
                        </div><!--col-12-->
                    </div><!---row-->

                    <div class="row mt-4 mx-3">
                        <div class="col-5 g-0">
                            <button type="submit" class="btn btn-primary w-100" id="loginBtnLogin">
                                {{ __('Register') }}
                            </button>
                        </div><!--col-5-->
                        <div class="col-7"></div>
                    </div><!--row-->

                    <div class="row mt-4 mx-3">
                        <div class="col-12 g-0">
                                <a href="{{ route('login') }}">
                                    {{ __('Back to the login') }}
                                </a>
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