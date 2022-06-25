<?php

namespace App\Http\Livewire\Recipes;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

use Livewire\Component;


class RecipeIngredients extends Component
{
    public $apiRecipeId;
    public $extendedIngredients;
    
    public function mount($recipeId){
        $this->apiRecipeId = $recipeId;
        $this->getRecipeInfo($recipeId);
    }

    // Get Recipe Information
    public function getRecipeInfo( $recipeId){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/'.$recipeId.'/information?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'includeNutrition'=>false,
        ]);
        $this->recipeInfo = $response->json();
        dd($this->recipeInfo);
        // Get Recipe's Ingredients
        $this->extendedIngredients=$this->recipeInfo['extendedIngredients'];
        
        return $this->extendedIngredients;
    }
    public function ingredientInfo($id){
        $this->emit('emitShowingredientInfoComponent',$id);
    }
   
    
}



   
