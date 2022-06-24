<div>
     @foreach($userFavoriteIngredients as $ingredient)
     {{$ingredient->name}}
    <img src="https://spoonacular.com/cdn/ingredients_250x250/@php echo  str_replace(" ","-",$ingredient->name);@endphp" alt="">
    @livewire('components.fav-ingredients-btn',['apiIngredientId'=>$ingredient->apiIngredientId])
    @endforeach
</div>
