<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeInstructions extends Component
{
    public $apiRecipeId;
    public $recipeInstructions;

    public function mount($recipeId){
        $this->apiRecipeId = $recipeId;
        $this->getRecipeInstructions($recipeId);
    }

    // Get Recipe Instructions
    public function getRecipeInstructions( $recipeId){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/'.$recipeId.'/analyzedInstructions?
        ', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
        ]);
        $this->recipeInstructions = $response->json();
        return $this->recipeInstructions;
    }
}