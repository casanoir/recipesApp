<div class="showAlphabetsAndData" >
    <div class="mt-3 showAllAlphabets">
        {{-- show all alphabets --}}
        @foreach ($alphabets as $alphabet)
            <a type="button" wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</a>
        @endforeach     
    </div>
    <hr class="mt-3" style="color:#efefef">
    <div class="showAllIngredients">
        {{-- Show all ingredients alphabetically --}}
        @foreach ($ingredientsAlphabetically as $ingredient)
            {{-- Ingredients --}}
            <div class="showIngredient">
                {{-- Ingredient Name and Btn show ingredient info --}}
                    <div class="ingredientNameBtn" >    
                        <button  wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">{{$ingredient->name}}</button>
                    </div>                
            </div>
        @endforeach
    </div>
</div>
    
