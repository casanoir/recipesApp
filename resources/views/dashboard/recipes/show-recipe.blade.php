@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3 class="mt-5 text-center">recipes</h3>
<div class="container" >
    <div class="row justify-content-center ">
        <div class="col-md-3 " style="background-color: rgb(112, 225, 43)" >
            @livewire('recipes.recipe-ingredients')
            @livewire('ingredients.ingredient-info')
        </div>
        <div class="col-md-9 " style="background-color:aquamarine">
            @livewire('recipes.recipe-info',['recipeId'=>$recipeId])
            @livewire('recipes.recipe-instructions')        
            @livewire('recipes.recipe-nutrition')
            
        </div>
    </div>
</div>
@endsection


