<div style="    display: flex;
    flex-direction: column;
    padding-left: 15%;
    padding-top: 15%;
    align-items: flex-start;
    font-size: 15px;
    text-transform: uppercase;">
    <div>
        @foreach ( $mealtypes as $mealtype)
        <a type="button" wire:click="getMealTypeValue($event.target.innerText)" style="color:white;margin-bottom: 10px;">
        {{$mealtype->name}}</a><hr>
        @endforeach
    </div>
</div>
