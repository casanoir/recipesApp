@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<div class="container" >
    <div class="row justify-content-center ">
        {{-- All Ingredients Alphabetically --}}
            <div class="col-md-3 " style="background-color: rgb(112, 225, 43)" >
                @livewire('ingredients.all-ingredients')
            </div>
        {{-- All Ingredients Alphabetically --}}
            <div class="col-md-9 " style="background-color:aquamarine">
                @livewire('ingredients.ingredient-info')
            </div>
    </div>
</div>
@endsection
