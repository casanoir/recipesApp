<div>
    <div class="recipesIng">
        @foreach($userFavoriteRecipes as $recipe)
        <div class="card">
            <div class="card__body">
                <img src="{{$recipe->image}}" alt="{{$recipe->name}}" class="card__image">
                
                <h4 class="card__title">{{$recipe->name}}</h4>
            </div>
            <a type="button" wire:click="removeFromFavorite({{$recipe->recipe_id}})" class="card__btn">Dislike</a>
            <a href="/recipe/{{$recipe->recipe_id}}" type="button" class="card__btn">View Recipe</a>
        </div>
        @endforeach
    </div>
    
</div>
