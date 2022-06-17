@extends('layouts.app')

@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<div class="row" style="width:100%; margin:0 ;">    
    {{-- All Ingredients Alphabetically --}}
        <div class="col-md-3 p-5 " style="background-color:  rgb(0 80 64); height: 100vh; gap: 5%; display: flex; flex-direction: column;" >
           <button class="btn btn-pdf">My Ingredient</button>
           <button class="btn btn-pdf">My Recipes</button>
           <button class="btn btn-pdf">My Favorites recipes</button>
        </div>
    {{-- Show Ingredient details --}}
        <div class="col-md-9" style="background-color: rgb(242, 242, 242); height: 100vh;">
            {{-- Ingredients Recipes --}}
            @livewire('ingredients.my-ingredient')

        </div>
</div>
@endsection
