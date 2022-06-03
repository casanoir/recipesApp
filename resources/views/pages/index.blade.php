@extends('layouts.app')

@section('content')
    {{-- navbar  --}}
    @include ('layouts.layout.navbar')

    <div id="indexBackground"></div>
    <!-- index Page content-->
    <div id="indexContainer" class="container">
        <div class="text-center">
            <h1>Find recipes using the ingredients you already have at home!</h1>
            <a class="btn btn-primary m-3" href="{{ route('about') }}">About Us</a>
            <a class="btn btn-primary m-3" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="btn btn-primary m-3" href="{{ route('register') }}">{{ __('Register') }}</a>
            <p>v1.0.0</p>
        </div>
    </div>

    {{-- footer --}}
    @include ('layouts.layout.footer')
@endsection

