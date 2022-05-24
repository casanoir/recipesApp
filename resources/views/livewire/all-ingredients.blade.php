<div >
    {{-- show all alphabets --}}
    @foreach ($alphabets as $alphabet)
        <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>
    @endforeach

    {{-- Show all ingredients alphabetically --}}
    @foreach ($ingredientsAlphabetically as $ingredient)
        {{-- Ingredient Name --}}
        <p>{{$ingredient->name}} </p>    
       
        <button wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">show info</button>

    @endforeach
</div>