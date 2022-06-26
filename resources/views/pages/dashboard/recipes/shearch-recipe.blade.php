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
  {{-- All Ingredients Alphabetically --}}
  <div id="sidebarSupportedContent" class="col-md-3 px-0 py-5 collapse show">
    @livewire('recipes.filter-searched-recipes',['searchQuery'=>$searchQuery])
  </div>
  {{-- Show Ingredient details --}}
  <div id="mainSupportedContent" class="col-md-9">
    @livewire('recipes.searched-recipes',['searchQuery'=>$searchQuery])
  </div>
</div>
@endsection


