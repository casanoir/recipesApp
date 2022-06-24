<div>
    @if (!$liked)
        <button wire:click="addToFavorite({{$recipeId}})">Like</button>
    @else
        <button wire:click="removeFromFavorite({{$recipeId}})">Dislike</button>
    @endif
</div>
