{{-- <div>
     @foreach($userFavoriteIngredients as $ingredient)
     {{$ingredient->name}}
    <img src="https://spoonacular.com/cdn/ingredients_250x250/@php echo  str_replace(" ","-",$ingredient->name);@endphp" alt="">
    @livewire('components.fav-ingredients-btn',['apiIngredientId'=>$ingredient->apiIngredientId])
    @endforeach
{{-- </div> --}}
{{-- @php dd(str_replace(" ","-",$ingredient->name))  ;@endphp --}}
{{-- almond-extract --}} 
<div>
    <div class="recipesIng">
        @foreach($userFavoriteIngredients as $ingredient)
        <div class="card">
            <div class="card__body">
                <img src="https://spoonacular.com/cdn/ingredients_250x250/@php echo  str_replace(" ","-",$ingredient->name);@endphp" alt="">
                
                <h4 class="card__title">{{$ingredient->name}}</h4>
            </div>
            @livewire('components.fav-ingredients-btn',['apiIngredientId'=>$ingredient->apiIngredientId])
        </div>
        @endforeach
    </div>
    
</div>