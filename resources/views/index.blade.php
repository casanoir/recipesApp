@extends('layouts.app')

@section('content')
    {{-- navbar  --}}
    @include ('layouts.layout.navbar')

    <!-- index Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>RECIPES AT HOUSE</h1>
            <p>You have all ingredients at home but you don't know which recipe can you cooking, the solution is "Recipes at house" App.
            </p>
            <a class="btn btn-primary m-3" href="{{ route('about') }}">About Us</a>
            <p>v1.0.0</p>
        </div>
    </div>

    {{-- footer --}}
    @include ('layouts.layout.footer')
@endsection

