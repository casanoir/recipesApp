<div>       
    @if ($showComponent=='myIng')
        @livewire('ingredients.my-ingredient')
    
    @elseif($showComponent=='myRec')
        @livewire('recipes.my-recipes',['selectedIngNames'=>$selectedIngNames])
    
    @elseif($showComponent=='myingInfo')
        <button wire:click="goBack" class="btn btn-pdf">Back to my ingredients</button>
        @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    
    @elseif($showComponent=='myFavIng')
        @livewire('home.favorites-ing')

    @elseif($showComponent=='myFavRec')
        @livewire('home.favorites-rec')
        
    @elseif($showComponent=='myHis')
        @livewire('home.history')

    @endif
</div>


