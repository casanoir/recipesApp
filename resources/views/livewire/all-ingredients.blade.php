<div >
    {{-- show all alphabets --}}
    @foreach ($alphabets as $alphabet)
        <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>
    @endforeach

    {{-- Show all ingredients alphabetically --}}
    @foreach ($ingredientsAlphabetically as $ingredient)
        {{-- Ingredient Name --}}
        <div class="row mt-2">
            {{-- <div class="col-md-5">
                <img src="https://spoonacular.com/cdn/ingredients_100x100/pineapple.jpg" alt="ingredientData-name">
            </div>
            <div class="col-md-7">
                <p>{{$ingredient->name}} </p>    
                <button wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">show info</button>
            </div> --}}
                <p>{{$ingredient->name}} </p>    
                <button wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">show info</button>
            
        </div>

    @endforeach
</div>