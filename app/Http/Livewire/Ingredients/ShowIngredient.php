<?php

namespace App\Http\Livewire\Ingredients;


use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class ShowIngredient extends Component
{
    public $apiIngredientId;
    public $btnAction;
        
    protected $listeners =[
        // allIngredients
        'emitApiIngredientId'=>'update'
    ];

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        $this->apiIngredientId=$apiIngredientId;
        $this->checkIngredient($apiIngredientId);

        return $this->apiIngredientId;    
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
    
    
    public function render()
    {
        return view('livewire.ingredients.show-ingredient');
    }
    
  
}
