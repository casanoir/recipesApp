@foreach ($teamMembers as $teamMember)
    <div class="col-4 aboutCard">
        <img src="{{$teamMember->imgUrl}}" class="circle mx-auto mt-3">
        <a style="width: 100%;"  class="btn btn-primary m-3" href="https://www.linkedin.com/in/{{$teamMember->profileUrl}}" target="_blank">{{$teamMember->firstName}} {{$teamMember->lastName}}</a> 
        <p>                                                       
            {{$teamMember->description}}
        </p>
    </div>
@endforeach