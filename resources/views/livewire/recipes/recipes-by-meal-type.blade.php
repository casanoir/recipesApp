<div>
    <h3>Recipes > {{$mealType}}</h3>
    <div style="    height: 80%;
    overflow: overlay;">
        <div class="recipesIng">
            @foreach ($recipesByMealType['recipes'] as $recipe)
            <div class="card">
                <div class="card__body">
                    <img src="https://spoonacular.com/recipeImages/{{$recipe['id']}}-312x231.jpg" alt="{{$recipe['title']}}" class="card__image">
                    
                    <h4 class="card__title">{{$recipe['title']}}</h4>
                    @livewire('components.fav-recipes-btn',['recipeId'=>$recipe['id']])
                </div>
                <a href="/recipe/{{$recipe['id']}}" type="button" class="card__btn">View Recipe</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
