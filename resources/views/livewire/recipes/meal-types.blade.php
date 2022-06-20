<div style="gap: 5%; display: flex; flex-direction: column;">
    @foreach ( $mealtypes as $mealtype)
    <button class="mb-3" wire:click="getMealTypeValue($event.target.innerText)" style="color:white;margin-bottom: 10px;  text-transform: uppercase;">
    {{$mealtype->name}}</button>
    @endforeach
</div>
