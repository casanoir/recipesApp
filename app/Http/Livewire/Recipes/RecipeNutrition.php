<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeNutrition extends Component
{
    public $recipeNutrition;

    public function mount(Request $request){
        $this->getRecipeNutrition(324694);

    }
    // Get Recipe Nutrition
    public function getRecipeNutrition( $recipeId){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/'.$recipeId.'/nutritionWidget.json?
        ', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
        ]);
        $this->recipeNutrition = $response->json();
        return $this->recipeNutrition;
    }
}
// https://api.spoonacular.com/recipes/1003464/nutritionWidget.json?apiKey=3727e8e26c9241faba401b1d59156e31
