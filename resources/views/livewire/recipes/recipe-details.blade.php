<div>
    @if($apiIngredientId)
    <div class="showIngredientDetails" >
        <button wire:click="goBack" class="btn btn-pdf">Back to the recipe</button>
        @livewire('ingredients.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    </div>
       
    @else
    <div class="ingredient-details">
        <div class="tabs">
            <input type="radio" id="tab11" name="tab-control" checked>
            <input type="radio" id="tab22" name="tab-control">
            <input type="radio" id="tab33" name="tab-control">
            <ul>
                <li title="Recipe Info">
                    <label for="tab11" role="button">
                        <span>Recipe Info</span>
                    </label>
                </li>
                <li title="Recipe Instructions">
                    <label for="tab22" role="button">
                        <span>Recipe Instructions</span>
                    </label>
                </li>
                <li title="Caloric Breakdown">
                    <label for="tab33" role="button">
                        <span>Recipe Nutrition</span>
                    </label>
                </li>
                
            </ul>
            {{-- <svg viewBox="0 0 24 24"> --}}
                {{-- <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" /> --}}
            {{-- </svg> --}}
            {{-- <br> --}}
            <div class="slider">
            <div class="indicator"></div>
            </div>
            <div class="content tab-content">
            <section>
                <h2>Recipe Info</h2>
                @livewire('recipes.recipe-info',['recipeId'=>$apiRecipeId])
                
            </section>
            <section>
                <h2>Recipe Instructions</h2>
                @livewire('recipes.recipe-instructions')        
                
            </section>
            <section>
                <h2>Recipe Nutrition</h2>
                <div style="height: 25rem;">
                    @livewire('recipes.recipe-nutrition')
                </div>
            </section>
            
            </div>
        </div>
        
    </div>
    @endif
</div>