<div class="card">
    <div class="card-header bg-info">
        <h3 class="text-white">Contact Us</h3>
    </div>
    <div class="card-body">
        
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text"  class="form-control" wire:model.debounce.500ms="name" >
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" class="form-control"wire:model.debounce.500ms="email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" class="form-control" wire:model.debounce.500ms="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Subject:</strong>
                        <input type="text"  class="form-control"wire:model.debounce.500ms="subject">
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Message:</strong>
                        <textarea  rows="3" class="form-control"wire:model.debounce.500ms="message"></textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>  
                </div>
            </div>
    
            <div class="form-group text-center">
                <button class="btn btn-success btn-submit" wire:click="storeContactForm">Save</button>
            </div>
        
    </div>
</div>
