<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeInfo extends Component
{
    public $recipeId ;
    public $recipeInfo ;
    public $extendedIngredients ;
    
    

    public function mount($recipeId){
        $this->getRecipeInfo($recipeId);
    }
    // Get Recipe Information
    public function getRecipeInfo( $recipeId){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/'.$recipeId.'/information?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'includeNutrition'=>false,
        ]);
        $this->recipeInfo = $response->json();
        
        // Get Recipe's Ingredients
        $this->extendedIngredients=$this->recipeInfo['extendedIngredients'];
        
        return $this->recipeInfo;
    }

    
    
    
}
