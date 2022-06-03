@extends('layouts.app')
<link rel="stylesheet"href="/public/css/about.css">
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3 class="mt-5 text-center">ABOUT US</h3>
<hr>
<div class="container">
    <div class="row">
        <div class="col-4 abdo">
            <img src="/images/abdo.img" class="circle">
            <a style="width: 100%;" class="btn btn-primary m-3" href="https://www.linkedin.com/in/abderrahmane-mendoun-920421223/" target="_blank">Abderrahmane Mendoun</a> 
            <p>
            Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,
            </p>
        </div>
        {{-- berre --}}
        <div class="col-4 berre">
            <img src="/images/berre.img" class="circle">
            <a style="width: 100%;"  class="btn btn-primary m-3" href="https://www.linkedin.com/in/berre-vandendorpe-14a328227/" target="_blank">Berre Vandendorpe</a> 
            <p>
            Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,
            </p>
        </div>
        {{-- ali --}}
        <div class="col-4 ali">
            <img src="/images/ali.img" class="circle">
            <a style="width: 100%;"  class="btn btn-primary m-3" href="https://www.linkedin.com/in/ali-el-baz-827a9b172/" target="_blank">ALI</a> 
            <p>
            Het is al geruime tijd een bekend gegeven dat een lezer, tijdens het bekijken van de layout van een pagina, afgeleid wordt door de tekstuele inhoud. Het belangrijke punt van het gebruik van Lorem Ipsum is dat het uit een min of meer normale verdeling van letters bestaat,
            </p>
        </div>
    </div>
        <div class = "row">
        <h3>contact formulier</h3>
        </div>
        
</div>
@endsection
