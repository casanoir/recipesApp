<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeInstructions extends Component
{
    public $recipeInstructions;

    public function mount(Request $request){
        $this->getRecipeInstructions(324694);

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
// https://api.spoonacular.com/recipes/324694/analyzedInstructions?apiKey=3727e8e26c9241faba401b1d59156e31
