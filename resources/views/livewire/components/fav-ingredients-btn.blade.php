<div>
    @if (!$liked)
        <button wire:click="addToFavorite({{$ingredientId}})">Like</button>
    @else
        <button wire:click="removeFromFavorite({{$ingredientId}})">Dislike</button>
    @endif
</div>
