{{--  Ingredients  --}}
<div>
  <h3 class="h3 text-light my-2" style="text-align: center">Ingredients</h3>
  @livewire('components.btn-use-recipe',['recipeIngredients'=>$extendedIngredients])
  </button>
<div id=recipesIngredientContainer class="showAllIngredients">
  <table class="table table-striped">
    @foreach ($extendedIngredients as $ingredientData)
      <tr>
        <td class="text-light ps-3">
          {{-- Ingredient Name --}}
          <h4 class="h4 mb-1">
            {{$ingredientData['name']}}
            <i wire:click="ingredientInfo({{$ingredientData['id']}})" class="h5 fas fa-question-circle"></i>
          </h4>
          <p>
            <span>{{$ingredientData['measures']['metric']['amount']}}</span>
            <span>{{$ingredientData['measures']['metric']['unitShort']}}</span>
          </p>
        </td>
      </tr>
    @endforeach
  </table>
</div>
</div>
