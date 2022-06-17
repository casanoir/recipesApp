@extends('layouts.app')

@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<div class="row" style="width:100%; margin:0 ;">    
    {{-- BUTTON TO LINK TO HOME COMPONENTS --}}
        <div class="col-md-3 p-5 " style="background-color:  rgb(0 80 64); height: 100vh; " >
            @livewire('home.home-btn')
        </div>
    {{-- HOME COMPONENTS --}}
        <div class="col-md-9" style="background-color: rgb(242, 242, 242); height: 100vh;">

            @livewire('home.home-components')
   
        </div>
</div>
@endsection
