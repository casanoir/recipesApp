{{--  Ingredients  --}}
<div>
  <h3 class="h3 text-light my-3" style="text-align: center">Ingredients</h3>
<div id=recipesIngredientContainer class="showAllIngredients">
  <table class="table table-striped">
    @foreach ($extendedIngredients as $ingredientData)
      <tr>
        <td class="text-light ps-3">
          {{-- Ingredient Name --}}
          <h4 class="h4 mb-1">
            {{$ingredientData['name']}}
            <i wire:click="ingredientInfo({{$ingredientData['id']}})" class="fas fa-question-circle"></i>
            </h4>
          <p>
            <span>{{$ingredientData['measures']['metric']['amount']}}</span>
            <span>{{$ingredientData['measures']['metric']['unitShort']}}</span>
          </p>
      </tr>
    @endforeach
  </table>
</div>
</div>
