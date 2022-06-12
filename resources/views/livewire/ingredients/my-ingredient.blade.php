
<div>
    <h4>My Ingredients</h4>
    {{-- <div>
      <label>Select all</label>
    <input type="checkbox" wire:model="selectAllTypes" class="form-checkbox h-6 w-6 text-green-500">
    </div>
    <div>
      <button wire:click.prevent="getRecipesIngredients" class="@if ($bulkDisabled) opacity-50 @endif btn btn-primary">search recipes</button>
    </div> --}}
    <form wire:submit.prevent="getRecipesIngredients">
      <button type="submit">get recipes</button>
      @foreach ($myIngredients as $myIngredient)
        <input type="checkbox" value="{{$myIngredient->apiIngredientId}}" wire:model.defer="selectedTypes"  class="form-checkbox h-6 w-6 text-green-500">
        <div>
            {{-- Ingredient Name --}}

            <h5   style="text-align: center">{{$myIngredient->name}}</h5>
            <p>
              <span>{{$myIngredient->amount}}</span> 
              <span>{{$myIngredient->unit}}</span> 
              <span>{{$myIngredient->date}}</span> 
            </p>
                  
            {{-- Ingredient Image --}}
            <img style="height: 130PX;width: 120px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$myIngredient->image}}" alt="{{$myIngredient->image}}">
        </div>
        <button  wire:click="ingredientInfo({{$myIngredient->id}})">show info</button>
      @endforeach
    </form>    
  </div>
