@extends('layouts.app')

@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<div class="row" style="width:100%; margin:0 ;">    
    {{-- All Ingredients Alphabetically --}}
        <div class="col-md-3 p-5 " style="background-color:  rgb(0 80 64); height: 100vh; " >
            @livewire('components.home-btn')
        </div>
    {{-- Show Ingredient details --}}
        <div class="col-md-9" style="background-color: rgb(242, 242, 242); height: 100vh;">

            @livewire('components.home')
   
        </div>
</div>
@endsection