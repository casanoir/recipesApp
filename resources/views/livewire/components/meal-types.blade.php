<div>
@foreach ( $meal as $meal)
 <a type="button" wire:click="getMealTypeValue($event.target.innerText)">{{$meal->name}} | </a>
@endforeach

</div>
