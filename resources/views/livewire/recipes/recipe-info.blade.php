<!-- Use a recipe id to get full information about a recipe-->
<div>

    <!-- Title -->
        <h3>Title</h3>
        {{$recipeInfo['title']}}

    <!-- Image -->
        <h3>Image</h3>
        <img style="height: 330PX;width: 520px;" src="{{$recipeInfo['image']}}" alt="{{$recipeInfo['title']}}
        ">

    {{-- Dish Types --}}
        <h3>Dish Types</h3>
        @foreach ($recipeInfo['dishTypes'] as $dishType)
            <li>{{$dishType}}</li>
        @endforeach

    <!-- Servings -->
        <h3>Servings</h3>
        {{$recipeInfo['servings']}}

    <!-- Ready In Minutes -->
        <h3>Ready In Minutes</h3>
        {{$recipeInfo['readyInMinutes']}}

    <!-- Health Score -->
        <h3>Health Score</h3>
        {{$recipeInfo['healthScore']}}

    <!-- Summary -->
        <h3>Summary</h3>
        {!!$recipeInfo['summary']!!}

</div>
