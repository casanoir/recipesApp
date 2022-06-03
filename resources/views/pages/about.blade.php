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

        @livewire('components.about-us-card',
        [
            'aboutUsImgUrl' =>'https://media-exp1.licdn.com/dms/image/C4E03AQGlbMGpRa-vFA/profile-displayphoto-shrink_200_200/0/1640533440722?e=1659571200&v=beta&t=gLTVn6vQ95SWyvDG1u7V6nMh12ouJ0u-fgd6-7nU0Ko',
            'linkedinAccount'=>'ali-el-baz-827a9b172',
            'linkedinName'=> 'ali elbaz'
        ])
        @livewire('components.about-us-card',
        [
            'aboutUsImgUrl' =>'https://media-exp1.licdn.com/dms/image/C4E03AQF7nTtvMWR9nA/profile-displayphoto-shrink_200_200/0/1638176785211?e=1659571200&v=beta&t=_wDqljIQNU_5YGTPlPLEmVu9_6VbneV5ywFM7j99lNU',
            'linkedinAccount'=>'berre-vandendorpe-14a328227/',
            'linkedinName'=> 'Berre vandendorpe'
        ])
        @livewire('components.about-us-card',
        [
            'aboutUsImgUrl' =>'https://media-exp1.licdn.com/dms/image/C4E03AQGSK6W60lQFSA/profile-displayphoto-shrink_200_200/0/1653044300776?e=1659571200&v=beta&t=mFa00vj7ll4K-BRGsCYlFRQL_o0LxS5vMi7CdCRey_4',
            'linkedinAccount'=>'abderrahmane-mendoun-920421223/',
            'linkedinName'=> 'Abderahmane mendoun'
        ])
    </div>
    
    <div class = "row">
        <div class="col-8 offset-2 mt-5">
                @livewire('modals.contact-form-modal')
        </div>
    </div>
        
</div>
@endsection
