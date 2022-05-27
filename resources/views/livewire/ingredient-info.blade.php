<div>
    @isset($apiIngredientId)
        {{-- Ingredient Name and Category ingredientData--}}
        <div class="row">
            {{-- $ingredientData['name'] --}}
            <h3>{{$ingredientData['name']}}</h3>

            {{-- ingredientData-categoryPath  --}}
            <div>
                <span>Category: </span>
                @foreach ($ingredientData['categoryPath'] as $categoryPath)
                    <span> {{$categoryPath}} |</span>
                @endforeach
            </div>
        </div>
        {{-- Ingredient Image and Substitutes ingredientSubstitutes--}}
        <div class="row">
            <div class="col-3">
                <img style="height: 130PX;width: 120px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$ingredientData['image']}}" alt="{{$ingredientData['name']}}">
            </div>
            {{-- START Ingredients Substitutes --}}
            <div class="col-9">
                @if ($ingredientSubstitutes['status'] === "success") 
                    <p>{{$ingredientSubstitutes['message']}}</p>
                    @foreach ($ingredientSubstitutes['substitutes'] as $substitute)
                        <li>{{$substitute}}</li>
                    @endforeach
                @else 
                    <p>{{$ingredientSubstitutes['message']}}</p>
                @endif 
            </div> 
            {{-- END Ingredients Substitutes --}}
        </div>
        {{-- Ingredients Nutrition --}}
        <div class="row">
            {{-- Ingredients Caloric Breakdown --}}
            @foreach($ingredientData['nutrition']['caloricBreakdown'] as $key => $value)
                <span>{{$key}}: {{$value}}</span>
            @endforeach
        </div>
        <div class="row" >
            {{-- Ingredients Nutrients --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">name</th>
                    <th scope="col">amount</th>
                    <th scope="col">unit</th>
                    <th scope="col">percentOfDailyNeeds</th>
                  </tr>
                </thead>
                <tbody style="height: 10px !important; overflow: scroll; ">
                    @foreach($ingredientData['nutrition']['nutrients'] as  $nutrient)
                        <tr>
                            <th scope="row">{{$nutrient['name']}}</th>
                            <td>{{$nutrient['amount']}}</td>
                            <td>{{$nutrient['unit']}}</td>
                            <td>{{$nutrient['percentOfDailyNeeds']}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>            
        </div>
        {{-- Recipes by Ingredient --}}
        @foreach ($ingredientRecipes as $recipe)
            <div class="card mt-5" style="width: 18rem;">
                <img src="https://spoonacular.com/recipeImages/{{$recipe['id']}}-312x231.jpg" class="card-img-top" alt="{{$recipe['title']}}">
                <div class="card-body">
                    <h5 class="card-title">{{$recipe['title']}}</h5>
                    <p>You need {{$recipe['missedIngredientCount']}} ingredients more to do that recipe.</p>
                    <a href="/recipes/" class="btn btn-primary">More details</a>
                </div>
            </div>
        @endforeach
    @endisset

    @empty($apiIngredientId)
        <h3>The 1,000 most frequently used ingredients </h3>
    @endempty
</div>