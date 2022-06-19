@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->

<div class="row" style="width:100%; margin:0 ;">    
        {{-- All Ingredients Alphabetically --}}
            <div class="col-md-3 p-0" style="background-color:  rgb(0 80 64); height: 100vh; " >
                    @livewire('recipes.recipe-ingredients',['recipeId'=>$recipeId])
            </div>
        {{-- Show Ingredient details --}}
      <div class="col-md-9" style="background-color: rgb(242, 242, 242); height: 100vh;">
        <div class="ingredient-details">
            <h2>Recipe's Ingredient Info</h2>
            <button href="/recipe/{{$recipeId}}" class="btn btn-pdf">Back to recipe</button>
            
            <div style="height: 25rem;">
                {{-- @livewire('recipes.recipe-ingredient-info') --}}
                @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
            </div>
      </div>
</div>
@endsection
