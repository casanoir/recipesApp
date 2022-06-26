<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeNutrition extends Component
{
    public $apiRecipeId;
    public $recipeNutrition;

    public function mount($recipeId){
        $this->apiRecipeId = $recipeId;
        $this->getRecipeNutrition($recipeId);
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
