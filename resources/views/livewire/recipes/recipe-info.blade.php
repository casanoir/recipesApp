<!-- Use a recipe id to get full information about a recipe-->
<div>

    <!-- Title -->
    <div class="div-ingredient-name">
        <h3 class="h3">{{$recipeInfo['title']}}</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @isset($recipeInfo['image'])
                <!-- Image -->
                    <img style="height: 330PX;width: 520px;" src="{{$recipeInfo['image']}}" alt="{{$recipeInfo['title']}}">
                @endisset
            </div><!--col-8-->
            <div class="col-md-4 align-middle">
                <div>
                <!-- Servings -->
                <h3 class="h3 my-5 text-primary">
                    <i class="fas fa-users"></i>
                    <span class="h5">{{$recipeInfo['servings']}}</span>
                </h3>

                <!-- Ready In Minutes -->
                <h3 class="h3 my-5 text-primary">
                    <i class="fas fa-clock"></i>
                    <span class="h5">{{$recipeInfo['readyInMinutes']}}min</span>
                </h3>

                <!-- Health Score -->
                <h3 class="h3 my-5 text-primary">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span class="h5">{{$recipeInfo['healthScore']}}</span>
                </h3>
                </div>
            </div>
        </div><!--row-->
    </div><!--container-->
    <!--dishtypes-->
    <div class="div-category-path">
        <span>Category :</span>
        @foreach ($recipeInfo['dishTypes'] as $dishType)
            <span class="ps-3">{{$dishType}}</span>
        @endforeach              
    </div>

    <hr/>
    <!-- Summary -->
    <h4 class="h4 mt-3">Summary</h4>
    {!!$recipeInfo['summary']!!}

</div>
