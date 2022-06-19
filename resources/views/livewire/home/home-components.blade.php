<div>       
    @if ($showComponent=='myIng')
        @livewire('ingredients.my-ingredient')
    @elseif($showComponent=='myRec')
        @livewire('recipes.my-recipes')
    @elseif($showComponent=='myingInfo')
    <a href="/home">< BACK</a>
    @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    @endif
</div>
