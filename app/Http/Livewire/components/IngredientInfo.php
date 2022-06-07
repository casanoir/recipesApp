<?php

namespace App\Http\Livewire\Components;

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
    public $btnAction;

    protected $listeners =[
        // allIngredients
        // 'emitApiIngredientId'=>'update',
        // btn add ingredient submit
        'refreshIngredientInfo'=>'refreshIngredientInfo',
    ];


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
    
    // Get 6 Recipes by Ingredient.
    public function getIngredientRecipes($ingredientName){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/findByIngredients?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number'=>6,
            'ingredients'=>$ingredientName,
        ]);
        
        $this->ingredientRecipes = $response->json();
        return $this->ingredientRecipes;
    }

    

    // the refreshIngredientInfo method luisteners to submit btn in the add ingredient modals  
    public function refreshIngredientInfo(){
        return $this->btnAction ="edit";
    }

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;
        
        
        
        // show ingredient information 
        $this->getIngredientInfo($apiIngredientId);
        
        // show ingredient Substitutes 
        $this->getIngredientSubstitutes($apiIngredientId);    
        
        // get the ingredient name from database 
        $this->ingredientName = DB::table('ingredients')->where('apiIngredientId','like',$apiIngredientId)->get('name');
        // after getting the name search for the recipes show ingredient Substitutes 
        $this->getIngredientRecipes($this->ingredientName[0]->name);
        
        // emit the name for  ingredient button
        $this->emit('ingredientName',$this->ingredientName[0]->name);

        
        
    }

}
