<div class="favoriteBtn">
    @if (!$liked)
        <button class="m-2" wire:click="addToFavorite({{$recipeId}})">
            <i class="fas fa-heart favoriteBtnOuterRecipe">
                <i class="fas fa-heart favoriteBtnInnerRecipe favoriteBtnFavorite"></i>
            </i>
        </button>
    @else
        <button class="m-2" wire:click="removeFromFavorite({{$recipeId}})">
            <i class="fas fa-heart favoriteBtnOuterRecipe">
                <i class="fas fa-heart favoriteBtnInnerRecipe favoriteBtnUnfavorite"></i>
            </i>
        </button>
    @endif
</div>
