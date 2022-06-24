<div class="favoriteBtn">
    @if (!$liked)
        <button class="m-2" wire:click="addToFavorite({{$recipeId}})">
            <i class="fas fa-heart favoriteBtnOuter">
                <i class="fas fa-heart favoriteBtnInner favoriteBtnFavorite"></i>
            </i>
        </button>
    @else
        <button class="m-2" wire:click="removeFromFavorite({{$recipeId}})">
            <i class="fas fa-heart favoriteBtnOuter">
                <i class="fas fa-heart favoriteBtnInner favoriteBtnUnfavorite"></i>
            </i>
        </button>
    @endif
</div>
