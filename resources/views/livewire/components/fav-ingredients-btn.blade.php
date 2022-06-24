<div class="favoriteBtn">
    @if (!$liked)
        <button class="m-2" wire:click="addToFavorite({{$ingredientId}})">
            <i class="fas fa-heart favoriteBtnOuter">
                <i class="fas fa-heart favoriteBtnInner favoriteBtnFavorite"></i>
            </i>
        </button>
    @else
        <button class="m-2" wire:click="removeFromFavorite({{$ingredientId}})">
            <i class="fas fa-heart favoriteBtnOuter">
                <i class="fas fa-heart favoriteBtnInner favoriteBtnUnfavorite"></i>
            </i>
        </button>
    @endif
</div>