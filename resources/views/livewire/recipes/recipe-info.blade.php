<!-- Use a recipe id to get full information about a recipe-->
<div>

    <!-- Title -->
    <div class="div-ingredient-name">
        <h3 class="h3">{{$recipeInfo['title']}}</h3>
    </div>
@isset($recipeInfo['image'])
    <!-- Image -->
        <img style="height: 330PX;width: 520px;" src="{{$recipeInfo['image']}}" alt="{{$recipeInfo['title']}}">
@endisset
        <!--dishtypes-->
        <div class="div-category-path">
            <span>Category :</span>
            @foreach ($recipeInfo['dishTypes'] as $dishType)
                <span class="ps-3">{{$dishType}}</span>
            @endforeach              
        </div>

        <hr/>

    <!-- Servings -->
        <h4 class="h4 mt-3">Servings</h4>
        {{$recipeInfo['servings']}}

    <!-- Ready In Minutes -->
        <h4 class="h4 mt-3">Ready In Minutes</h4>
        {{$recipeInfo['readyInMinutes']}}

    <!-- Health Score -->
        <h4 class="h4 mt-3">Health Score</h4>
        {{$recipeInfo['healthScore']}}

    <!-- Summary -->
        <h4 class="h4 mt-3">Summary</h4>
        {!!$recipeInfo['summary']!!}

</div>
