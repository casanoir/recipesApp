@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3>home</h3>
<div class="container" >
    <div class="row justify-content-center ">
        <div class="col-md-3 " style="background-color: rgb(112, 225, 43)" >
            Ingredients
        </div>
        <div class="col-md-9 " style="background-color:aquamarine">
            Recipes
        </div>
    </div>
</div>
@endsection
