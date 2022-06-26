@extends('layouts.app')

@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->
<h3 class="mt-5 text-center">ABOUT US</h3>
<hr>
<div class="container">
    <div class="row">
        @livewire('about-us.about-us-card',['teamMembers'=> $teamMembers,]) 
        <hr>
        <div class = "row">
            <div class="col-8 offset-2 mt-3">
                <div style="text-align: center">
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">
                        Contact Us
                    </button>
                </div>
                <!--START contactModal-->
                <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title " id="contactModalLabel">Contact Us</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @livewire('modals.contact-form-modal')
                        </div>
                    </div>
                </div>
                <!--END contactModal--> 

            </div>
        </div>
    </div>
</div>
@include ('layouts.layout.footer')
@endsection
