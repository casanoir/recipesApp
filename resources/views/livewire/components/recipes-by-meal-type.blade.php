<div class="mt-5 container">
    <div class="row">
        @foreach ($recipesByMealType['recipes'] as $recipes)
            <div class="card col-4">
                <img src="{{$recipes['image']}}"  class="card-img-top" alt="{{$recipes['title']}}">
                <div class="card-body">
                    <h5 class="card-title">{{$recipes['title']}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/recipe/{{$recipes['id']}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
