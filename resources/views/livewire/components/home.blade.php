<div>       
    @if ($showComponent=='myIng')
        @livewire('ingredients.my-ingredient')
    @elseif($showComponent=='myRec')
    {{-- {{$selectedIngNames}} --}}
        @livewire('recipes.my-recipes')
    @endif
</div>
