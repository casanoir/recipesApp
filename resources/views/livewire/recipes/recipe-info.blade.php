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

    {{--  Ingredients  --}}
        <h3>Ingredients</h3>
        @foreach ($recipeInfo['extendedIngredients'] as $extendedIngredients)
            <div style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;">
                {{-- Ingredient Image --}}
                    <div style="width: 20%;">
                        {{-- <img style="height: 70PX;width: 50px;" src="https://spoonacular.com/cdn/ingredients_100x100/{{$extendedIngredients['name']}}" alt="{{$extendedIngredients['name']}}"> --}}
                    </div>
                {{-- Ingredient Name and Btn show ingredient info --}}
                    <div style="width: 80%;justify-content: center;display: grid;">
                        <p>{{$extendedIngredients['name']}} </p>    
                        <p>
                            <span>{{$extendedIngredients['measures']['metric']['amount']}}</span>
                            <span>{{$extendedIngredients['measures']['metric']['unitShort']}}</span>  
                        </p>

                        <button  wire:click="ingredientInfo({{$extendedIngredients['id']}})">show info</button>

                    </div>                
            </div>
        @endforeach
</div>
