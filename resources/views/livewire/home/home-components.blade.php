<div>       
    @if ($showComponent=='myIng')
        @livewire('ingredients.my-ingredient')
    @elseif($showComponent=='myRec')
        @livewire('recipes.my-recipes')
    @elseif($showComponent=='myingInfo')
    <button wire:click="goBack" class="btn btn-pdf">Back to my ingredients</button>
    @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    @endif
</div>
