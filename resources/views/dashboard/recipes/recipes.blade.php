@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<div class="container" >
    <div class="row justify-content-center ">
       @livewire('components.meal-types')
    </div>
    <div class="row justify-content-center ">       
       @livewire('components.recipes-by-meal-type')       
    </div>
   
</div>
@endsection
