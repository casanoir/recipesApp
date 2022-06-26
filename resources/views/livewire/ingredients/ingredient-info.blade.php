<div class="ingredient-info">
    <div class="row1 ">
        <div class="mt-5">
            {{-- Ingredient Image --}}
            @livewire('components.fav-ingredients-btn',['apiIngredientId'=>$apiIngredientId])
            <img style="height: 90px;width: 100px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$ingredientData['image']}}" alt="{{$ingredientData['name']}}">
        </div>
        <div class="div-ingredient-name">
            {{-- Ingredient Name --}}
            <h3 class="h3">{{$ingredientData['name']}}</h3>
            @if($ingredientData['categoryPath'])
        <div class="div-category-path">
            {{-- ingredientData-categoryPath  --}}
            <span>Category : </span>
            @foreach ($ingredientData['categoryPath'] as $categoryPath)
                <span class="ps-3"> {{$categoryPath}} </span>
            @endforeach
        </div>
        @endif
        </div>
            
        <div class="div-ingredient-btn">
            @livewire('ingredients.ingredient-btn',['apiIngredientId'=>$apiIngredientId])
        </div>
    </div>
    <div class="ingredient-details">
        <div class="tabs">
            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">
            <input type="radio" id="tab4" name="tab-control">
            <ul>
                <li title="Ingredient Nutrients">
                    <label for="tab1" role="button">
                        <span>Ingredient Nutrients</span>
                    </label>
                </li>
                <li title="Recipes by Ingredient">
                    <label for="tab2" role="button">
                        <span>Recipes by Ingredient</span></label></li>
                <li title="Caloric Breakdown">
                    <label for="tab3" role="button">
                        <span>Caloric Breakdown</span></label></li>
                <li title="Ingredient Substitutes">
                    <label for="tab4" role="button">
                        <span>Ingredient Substitutes</span>
                    </label>
                </li>
            </ul>
            {{-- <svg viewBox="0 0 24 24"> --}}
                {{-- <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" /> --}}
            {{-- </svg> --}}
            {{-- <br> --}}
            <div class="slider">
              <div class="indicator"></div>
            </div>
            <div class="content tab-content">
              <section>
                <h2>Ingredient Nutrients</h2>
                <div class="table-responsive">
                    <table class="table table-light">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">name</th>
                                <th scope="col">amount</th>
                                <th scope="col">unit</th>
                                <th scope="col">percentOfDailyNeeds</th>
                            </tr>
                        </thead>
                        <tbody style="height: 10px !important; overflow: scroll; ">
                            @foreach($ingredientData['nutrition']['nutrients'] as  $nutrient)
                                <tr>
                                    <td scope="row">{{$nutrient['name']}}</td>
                                    <td>{{$nutrient['amount']}}</td>
                                    <td>{{$nutrient['unit']}}</td>
                                    <td>{{$nutrient['percentOfDailyNeeds']}} %</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </section>
              <section>
                <h2>Recipes by Ingredient</h2>
                <div class="recipesIng">
                    @foreach ($ingredientRecipes as $recipe)
                    <div class="card">
                        <div class="card__body">
                            <img src="https://spoonacular.com/recipeImages/{{$recipe['id']}}-312x231.jpg" alt="{{$recipe['title']}}" class="card__image">
                            
                            <h4 class="card__title">{{$recipe['title']}}</h4>
                            <p class="card__description">You need {{$recipe['missedIngredientCount']}} ingredients more to do that recipe.</p>
                        </div>
                        <a href="/recipe/{{$recipe['id']}}" type="button" class="card__btn">View Recipe</a>
                    </div>
                    @endforeach
                </div>
              </section>
              <section>
                <h2>Caloric Breakdown</h2>
                <div style="height: 25rem;">
                    @livewire('components.caloric-breakdown-pie-chart')
                 </div>
              </section>
              <section>
                <h2>Ingredient Substitutes</h2>
                <div class="ingSubs">
                    <div>
                        @if ($ingredientSubstitutes['status'] === "success") 
                        <p>{{$ingredientSubstitutes['message']}}</p>
                        @foreach ($ingredientSubstitutes['substitutes'] as $substitute)
                            <li>{{$substitute}}</li>
                        @endforeach
                    @else 
                        <p>{{$ingredientSubstitutes['message']}}</p>
                    @endif 
                    </div>
                </div>
              </section>
            </div>
        </div>
        
    </div>  
</div>