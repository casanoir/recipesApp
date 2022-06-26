<div>
    <div >
        <div>
            <h4>Search: {{$searchedQuery}}</h4>
            <div>
                <p>Total Results: </p><span>{{$searchedRecipes['totalResults']}}</span>
            </div>
        </div>
        <hr>
       <div class="recipesIng">
        @foreach($searchedRecipes['results'] as $recipe)
        <div class="card">
            <div class="card__body">
                <img src="{{$recipe['image']}}" alt="{{$recipe['title']}}" class="card__image">
                
                <h4 class="card__title">{{$recipe['title']}}</h4>
            </div>
            <div>
                <a href="/recipe/{{$recipe['id']}}" type="button" class="card__btn">View Recipe</a>
            </div>
        </div>
    @endforeach
       </div>
    </div>
</div>
