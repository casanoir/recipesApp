<?php

namespace App\Http\Livewire\ingredients;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use DB;

class IngredientInfo extends Component
{
    public $apiIngredientId;
    public $ingredientName;
    public $ingredientData;
    public $ingredientSubstitutes;
    public $SubStatus = "success";
    public $ingredientRecipes;
    
    protected $listeners =['ingredientInfo'=>'update'];

 
    // Get all available information about an ingredient
    public function getIngredientInfo($id){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/food/ingredients/'.$id.'/information?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'amount' => 1,
        ]);
        $this->ingredientData = $response->json();
        return $this->ingredientData;
    }

    // Search for substitutes for a given ingredient.
    public function getIngredientSubstitutes($id){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/food/ingredients/'.$id.'/substitutes', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
        ]);
        $this->ingredientSubstitutes = $response->json();
        return $this->ingredientSubstitutes;
    }
    
    // Get 8 Recipes by Ingredient.
    public function getIngredientRecipes($ingredientName){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/findByIngredients?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number'=>8,
            'ingredients'=>$ingredientName,
        ]);
        $this->ingredientRecipes = $response->json();
        return $this->ingredientRecipes;
    }

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;
        $this->ingredientName = DB::table('ingredients')->where('apiIngredientId','like',$apiIngredientId)->get('name');
        
        $this->getIngredientInfo($apiIngredientId);
        $this->getIngredientSubstitutes($apiIngredientId);
        $this->getIngredientRecipes($this->ingredientName[0]->name);
    }

}
// https://api.spoonacular.com/recipes/findByIngredients?ingredients={{ $ingredientName }}&number=8
// GET https://api.spoonacular.com/recipes/findByIngredients?ingredients=apples,+flour,+sugar&number=2
// GET https://api.spoonacular.com/food/ingredients/9266/information?apiKey=3727e8e26c9241faba401b1d59156e31&amount=1
