<!-- Get an Nutritional Information of a recipe. -->
<div>
    <h2>Nutritional Information</h2>

    {{-- Calories - Protein - Total Fat - Carbs --}}
    <h5>Quickview</h5>
    <div>
        <span>Calories: {{$recipeNutrition['calories']}}</span><br>
        <span>Protein{{$recipeNutrition['carbs']}}</span><br>
        <span>Total Fat{{$recipeNutrition['fat']}}</span><br>
        <span>Carbs{{$recipeNutrition['protein']}}</span><hr>
        
    </div>

    {{-- Bad Nutrition --}}
    <h5>Bad Nutrition</h5>
    @foreach($recipeNutrition['bad'] as $badRecipeNutrition)
        <span>{{$badRecipeNutrition['title']}}</span>
        <span>{{$badRecipeNutrition['amount']}}</span><br>
        <span>Percent Of Daily Needs: {{$badRecipeNutrition['percentOfDailyNeeds']}}%</span>
        <div style="width:500px; height:50px; background-color: white; border: 1px solid black;">
            <div style="width: {{$badRecipeNutrition['percentOfDailyNeeds']}}%; height:100%; background-color: red; max-width: 100%;">
        </div>
        <hr>
    @endforeach
    
    {{-- Good Nutrition --}}
    <h5>Good Nutrition</h5>
    @foreach($recipeNutrition['bad'] as $goodRecipeNutrition)
        <span>{{$goodRecipeNutrition['title']}}</span>
        <span>{{$goodRecipeNutrition['amount']}}</span><br>
        <span>Percent Of Daily Needs: {{$goodRecipeNutrition['percentOfDailyNeeds']}}%</span>
        <div style="width:500px; height:50px; background-color: white; border: 1px solid black;">
            <div style="width: {{$goodRecipeNutrition['percentOfDailyNeeds']}}%; height:100%; background-color: green; max-width: 100%;">
        </div>
        <hr>
        
    @endforeach

</div>
{{-- $recipeNutrition --}}
