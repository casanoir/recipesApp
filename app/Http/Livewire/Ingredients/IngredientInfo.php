<?php

namespace App\Http\Livewire\ingredients;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class IngredientInfo extends Component
{
    public $apiIngredientId;
    public $ingredientId;
    public $user_id;
    public $ingredientName;
    public $ingredientData;
    public $ingredientSubstitutes;
    public $ingredientRecipes;
    public $action;

    protected $listeners =[
        'ingredientInfo'=>'update',
        'refreshParent'=>'updateAction',
    ];


    // Get all available information about an ingredient
    public function getIngredientInfo($id){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/food/ingredients/'.$id.'/information?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'amount' => 1,
        ]);
        $this->ingredientData = $response->json();
        $this->emit('ingredientUnits',$this->ingredientData['possibleUnits']);
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
            'number'=>6,
            'ingredients'=>$ingredientName,
        ]);
        $this->ingredientRecipes = $response->json();
        return $this->ingredientRecipes;
    }

    public function checkIngredient($ingredientId,$myIngredientsId){
        if (in_array($this->ingredientId, $this->myIngredientsId)){
            $this->action = "edit";
            return $this->action;
        }
        else{
            return $this->action ="add";
        }
    }

    public function updateAction(){
        return $this->action ="edit";
    }

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;

        $this->ingredientId=DB::table('ingredients')->where('apiIngredientId',$apiIngredientId)->value('id');
        $this->user_id= Auth::user()->id;

        $this->myIngredientsId = DB::table('ingredients_users')->where('user_id',$this->user_id)->pluck('ingredient_id')->toArray();
        
        $this->checkIngredient($this->ingredientId,$this->myIngredientsId);

        $this->ingredientName = DB::table('ingredients')->where('apiIngredientId','like',$apiIngredientId)->get('name');
        $this->emit('ingredientName',$this->ingredientName[0]->name);
        
        $this->getIngredientInfo($apiIngredientId);
        $this->getIngredientSubstitutes($apiIngredientId);
        $this->getIngredientRecipes($this->ingredientName[0]->name);
    }

}
