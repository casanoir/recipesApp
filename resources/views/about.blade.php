@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3 class="mt-5 text-center">ABOUT US</h3>
<hr>
<div class="container">
    <div class="row">
        <div class="col-4">
            <a style="width: 100%;" class="btn btn-primary m-3" href="https://www.linkedin.com/in/abderrahmane-mendoun-920421223/">Abderrahmane Mendoun</a> 
        </div>
        <div class="col-4">
            <a style="width: 100%;"  class="btn btn-primary m-3" href="https://www.linkedin.com/in/berre-vandendorpe-14a328227/">Berre Vandendorpe</a> 
        </div>
        <div class="col-4">
            <a style="width: 100%;"  class="btn btn-primary m-3" href="">ALI</a> 
        </div>
    </div>
</div>

@endsection
