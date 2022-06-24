<div>
    <div class="recipesIng">
        @foreach($userFavoriteRecipes as $recipe)
        <div class="card">
            <div class="card__body">
                <button class="m-2" wire:click="removeFromFavorite({{$recipe->recipe_id}}">
                    <i class="fas fa-heart favoriteBtnOuter">
                        <i class="fas fa-heart favoriteBtnInner favoriteBtnUnfavorite"></i>
                    </i>
                </button>
                <img src="{{$recipe->image}}" alt="{{$recipe->name}}" class="card__image">
                
                <h4 class="card__title">{{$recipe->name}}</h4>
            </div>
            <a href="/recipe/{{$recipe->recipe_id}}" type="button" class="card__btn">View Recipe</a>
        </div>
        @endforeach
    </div>
    
</div>
