<!-- Get an Nutritional Information of a recipe. -->
<div>
    <h2>Nutritional Information</h2>

    {{-- Calories - Protein - Total Fat - Carbs --}}
    <h4 class="h4">Quickview</h4>
    <div>
        <span><b>Calories:</b> {{$recipeNutrition['calories']}}</span><br>
        <span><b>Protein:</b> {{$recipeNutrition['carbs']}}</span><br>
        <span><b>Total Fat:</b> {{$recipeNutrition['fat']}}</span><br>
        <span><b>Carbs:</b> {{$recipeNutrition['protein']}}</span><hr>
        
    </div>

    {{-- Bad Nutrition --}}
    <h4 class="h4 mt-3">Bad Nutrition</h4>
    @foreach($recipeNutrition['bad'] as $badRecipeNutrition)
        <span><b>{{$badRecipeNutrition['title']}}</b></span>
        <span> {{$badRecipeNutrition['amount']}}</span><br>
        <span>Percent Of Daily Needs: {{$badRecipeNutrition['percentOfDailyNeeds']}}%</span>
        <div class="percentageBarBackground">
            <div class="percentageBarInside percentageBarBad" style="width: {{$badRecipeNutrition['percentOfDailyNeeds']}}%;">
        </div>
        <hr class="mb-3">
    @endforeach
    
    {{-- Good Nutrition --}}
    <h4 class="h4 mt-4">Good Nutrition</h4>
    @foreach($recipeNutrition['bad'] as $goodRecipeNutrition)
        <span><b>{{$goodRecipeNutrition['title']}}</b></span>
        <span> {{$goodRecipeNutrition['amount']}}</span><br>
        <span>Percent Of Daily Needs: {{$goodRecipeNutrition['percentOfDailyNeeds']}}%</span>
        <div class="percentageBarBackground">
            <div class="percentageBarInside percentageBarGood" style="width: {{$goodRecipeNutrition['percentOfDailyNeeds']}}%;">
        </div>
        <hr class="mb-3">
        
    @endforeach

</div>
{{-- $recipeNutrition --}}
