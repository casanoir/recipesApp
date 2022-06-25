<div>
    <h2 class="text-center m-3">Recipes by Ingredient</h2>
    <div class="recipesIng">
        @foreach ($ingredientRecipes as $recipe)
        <div class="card">
            <div class="card__body">
                <img src="https://spoonacular.com/recipeImages/{{$recipe['id']}}-312x231.jpg" alt="{{$recipe['title']}}" class="card__image">
                
                <h4 class="card__title">{{$recipe['title']}}</h4>
            </div>
            <div>
                @if($recipe['missedIngredientCount'] == 0)
                    <p class="card__description">You have all ingredients  to do that recipe.</p>
                @else
                    <p class="card__description">You need {{$recipe['missedIngredientCount']}} ingredients more to do that recipe.</p>
                @endif
                <a href="/recipe/{{$recipe['id']}}" type="button" class="card__btn">View Recipe</a>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
