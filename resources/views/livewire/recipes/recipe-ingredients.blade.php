{{--  Ingredients  --}}
<h3>Ingredients</h3>
@foreach ($extendedIngredients as $ingredientData)
<div>
   {{-- Ingredient Name --}}
   <h3   style="text-align: center">{{$ingredientData['name']}}</h3>
   <p>
    <span>{{$ingredientData['measures']['metric']['amount']}}</span>
    <span>{{$ingredientData['measures']['metric']['unitShort']}}</span>  
</p>
        
   {{-- Ingredient Image --}}
       <img style="height: 130PX;width: 120px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$ingredientData['image']}}" alt="{{$ingredientData['name']}}">

  <button  wire:click="ingredientInfo({{$ingredientData['id']}})">show info</button>
</div>
@endforeach
