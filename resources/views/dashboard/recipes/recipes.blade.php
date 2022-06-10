@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3 class="mt-5 text-center">recipes</h3>
<div class="container" >
    <div class="row justify-content-center ">
        <h3>recipes</h3>
       <div>
       @livewire('components.meal-types')
       </div>
    </div>
   
</div>
@endsection
