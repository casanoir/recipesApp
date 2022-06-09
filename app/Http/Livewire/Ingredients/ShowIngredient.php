<?php

namespace App\Http\Livewire\Ingredients;


use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class ShowIngredient extends Component
{
    // public $apiIngredientId;
  
        
    // protected $listeners =[
    //     // allIngredients
    //     'emitApiIngredientId'=>'update'
    // ];

    // // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    // public function update($apiIngredientId){
    //     $this->apiIngredientId=$apiIngredientId;

    //     return $this->apiIngredientId;    
    // }
    
    
    // public function render()
    // {
    //     return view('livewire.ingredients.show-ingredient');
    // }
    
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
        'emitApiIngredientId'=>'update',
        // btn add ingredient submit
        'refreshBtnAction'=>'updateBtnAction',
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

    // check of the user has the ingredient ?? and change the action from add to edit
    public function checkIngredient($apiIngredientId){
        
        // 1* get the ingredient Id from database with apiIngredientId
        $this->ingredientId=DB::table('ingredients')->where('apiIngredientId',$apiIngredientId)->value('id');
        
        // emit the ingredientId for add ingredient modals
        $this->emit('emitIngredientId',$this->ingredientId);

        // 2* get the user Id 
        $this->user_id= Auth::user()->id;

        // 3*get the ingredients id's ,that the user has.
        $this->myIngredientsId = DB::table('ingredients_users')->where('user_id',$this->user_id)->pluck('ingredient_id')->toArray();
        
        // 4*check if the user has already the ingredient
        if (in_array($this->ingredientId, $this->myIngredientsId)){
            $this->btnAction = "edit";
            return $this->btnAction;
        }
        else{
            return $this->btnAction ="add";
        }
    }

    // the updateAction method luisteners to save btn in the add ingredient modals  
    public function updateBtnAction(){
        return $this->btnAction ="edit";
    }

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;
        
        // check if the user has already the ingredient
        $this->checkIngredient($apiIngredientId);
        
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
