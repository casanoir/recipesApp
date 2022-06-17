{{--  Ingredients  --}}
<h3 class="h3 text-light my-3" style="text-align: center">Ingredients</h3>
<div id=recipesIngredientContainer class="showAllIngredients">
  <table class="table table-striped">
    @foreach ($extendedIngredients as $ingredientData)
      <tr>
        <td class="text-light ps-3">
          {{-- Ingredient Name --}}
          <h3 class="h4 mb-1">{{$ingredientData['name']}}</h3>
          <p>
            <span>{{$ingredientData['measures']['metric']['amount']}}</span>
            <span>{{$ingredientData['measures']['metric']['unitShort']}}</span>
          </p>
          {{-- Ingredient Image --}}
          {{-- <img style="height: 130PX;width: 120px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$ingredientData['image']}}" alt="{{$ingredientData['name']}}"> --}}
          {{-- <button class="btn btn-primary" wire:click="ingredientInfo({{$ingredientData['id']}})">show info</button> --}}
        </td>
      </tr>
    @endforeach
  </table>
</div>
