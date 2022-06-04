<div>
    @isset($apiIngredientId)
        @if ($btnAction == 'add')
            @livewire('components.ingredient-btn',[
                                        'btnAction'=>'add',
                                        ])
        @else
            @livewire('components.ingredient-btn',[
                                        'btnAction'=>'edit',
                                        ])
        @endif
        {{-- Ingredient Name --}}
            <h3   style="text-align: center">{{$ingredientData['name']}}</h3>
        
        {{-- Ingredient Image --}}
            <img style="height: 130PX;width: 120px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$ingredientData['image']}}" alt="{{$ingredientData['name']}}">

        {{-- ingredientData-categoryPath  --}}
            <span>Category: </span>
            @foreach ($ingredientData['categoryPath'] as $categoryPath)
                <span> {{$categoryPath}} |</span>
            @endforeach

        {{-- Ingredients Caloric Breakdown --}}
            @foreach($ingredientData['nutrition']['caloricBreakdown'] as $key => $value)
                <span>{{$key}}: {{$value}} %</span>
            @endforeach
        
        {{-- Ingredients Substitutes --}}
            @if ($ingredientSubstitutes['status'] === "success") 
                <p>{{$ingredientSubstitutes['message']}}</p>
                @foreach ($ingredientSubstitutes['substitutes'] as $substitute)
                    <li>{{$substitute}}</li>
                @endforeach
            @else 
                <p>{{$ingredientSubstitutes['message']}}</p>
            @endif 
            
        {{-- Ingredients Nutrients --}}
            <div class="row" >
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
                                <td>{{$nutrient['percentOfDailyNeeds']}} %</td>
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
                        <a href="/recipe/{{$recipe['id']}}" class="btn btn-primary">More details</a>
                    </div>
                </div>
            @endforeach
    @endisset

    @empty($apiIngredientId)
        <h3 class="mt-3" style="text-align: center">The 1,000 most frequently used ingredients </h3>
    @endempty
</div>