<div class="favoriteBtn">
    @if (!$liked)
        <button class="m-2" wire:click="addToFavorite({{$ingredientId}})">
            <i class="fas fa-heart favoriteBtnOuterIngredient">
                <i class="fas fa-heart favoriteBtnInnerIngredient favoriteBtnFavorite"></i>
            </i>
        </button>
    @else
        <button class="m-2" wire:click="removeFromFavorite({{$ingredientId}})">
            <i class="fas fa-heart favoriteBtnOuterIngredient">
                <i class="fas fa-heart favoriteBtnInnerIngredient favoriteBtnUnfavorite"></i>
            </i>
        </button>
    @endif
</div>