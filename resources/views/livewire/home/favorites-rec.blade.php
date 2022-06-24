<div>
    <div class="recipesIng">
        @foreach($userFavoriteRecipes as $recipe)
        <div class="card">
            <div class="card__body">
                <div class="favoriteBtn">
                    <button class="m-2" wire:click="removeFromFavorite({{$recipe->recipe_id}}">
                        <i class="fas fa-heart favoriteBtnOuterRecipe">
                            <i class="fas fa-heart favoriteBtnInnerRecipe favoriteBtnUnfavorite"></i>
                        </i>
                    </button>
                </div>
                <img src="{{$recipe->image}}" alt="{{$recipe->name}}" class="card__image">
                
                <h4 class="card__title">{{$recipe->name}}</h4>
            </div>
            <a href="/recipe/{{$recipe->recipe_id}}" type="button" class="card__btn">View Recipe</a>
        </div>
        @endforeach
    </div>
    
</div>
