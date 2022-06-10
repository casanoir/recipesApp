<div>
    @isset($apiIngredientId)

        @livewire('components.ingredient-btn',['apiIngredientId'=>$apiIngredientId])
        
        @livewire('components.ingredient-info',['apiIngredientId'=>$apiIngredientId])

    @endisset
    @empty($apiIngredientId)

        <h3 class="mt-3" style="text-align: center">The 1,000 most frequently used ingredients </h3>
    
    @endempty
</div>