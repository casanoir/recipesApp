<div class="mt-3 px-3" >
    <h3 style="text-align: center">All Ingredients</h3>
    <hr>
    <div style="display: flex">
        <div style="display: flex; flex-direction: column; align-items: stretch; justify-content: flex-start" class="me-3" >
            {{-- show all alphabets --}}
                @foreach ($alphabets as $alphabet)
                    <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>
                @endforeach        
        </div>
        <div style="display: flex; flex-direction: column; align-items: stretch;">
            {{-- Show all ingredients alphabetically --}}
            @foreach ($ingredientsAlphabetically as $ingredient)
                {{-- Ingredients --}}
                <div style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;">
                    {{-- Ingredient Image --}}
                        <div style="width: 20%;">
                            <img style="height: 70PX;width: 50px;" src="https://spoonacular.com/cdn/ingredients_100x100/pineapple.jpg" alt="ingredientData-name">
                        </div>
                    {{-- Ingredient Name and Btn show ingredient info --}}
                        <div style="width: 80%;justify-content: center;display: grid;">
                            <p>{{$ingredient->name}} </p>       
                            <button  wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">show info</button>
                        </div>                
                </div>
    
            @endforeach
        </div>
    </div>
    
</div>
