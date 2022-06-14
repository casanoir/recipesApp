<div>
    <div>
        @foreach ( $mealtypes as $mealtype)
        <a type="button" wire:click="getMealTypeValue($event.target.innerText)">
        {{$mealtype->name}}</a>
        @endforeach
    </div>
</div>
