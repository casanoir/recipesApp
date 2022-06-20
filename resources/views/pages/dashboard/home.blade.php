@extends('layouts.app')

@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')

<!--Sidebar toggle button-->
<div class="row">
    <button id="sidebarToggler" class="navbar-toggler btn btn-primary smallScreenOnly" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarSupportedContent" aria-controls="sidebarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle sidebar') }}">
        <i class="fas fa-bars"></i>
    </button>
</div>

<!-- home Page content-->
<div class="row" style="width:100%; margin:0 ;">    
    {{-- BUTTON TO LINK TO HOME COMPONENTS --}}
        <div id="sidebarSupportedContent" class="col-md-3 p-5 collapse show" style=" " >
            @livewire('home.home-btn')
        </div>
    {{-- HOME COMPONENTS --}}
        <div id="mainSupportedContent" class="col-md-9">    
            @livewire('home.home-components')  
        </div>
</div>
@endsection
