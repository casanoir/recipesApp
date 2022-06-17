<div>
    @empty($apiIngredientId)
        <div class="mainIngredient" >
            <h3 class="mt-3" >Main ingredient</h3>
            <p class="mt-4 mainIngredientDescription" >Knowing your way around a kitchen’s basic ingredients is seriously important and we’ve split the 1,000 most frequently used ingredients up by alphabeticly.</p>
        </div>
    @endempty
    @isset($apiIngredientId)
    <div class="showIngredientDetails" >
        @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    </div>
    @endisset
</div>