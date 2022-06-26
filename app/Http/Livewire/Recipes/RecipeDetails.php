<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;

class RecipeDetails extends Component
{
    public $apiRecipeId;
    public $apiIngredientId;
    protected $listeners =[
        'emitShowingredientInfoComponent'=>'update'  
    ];
    
    public function mount($recipeId){
        $this->apiRecipeId = $recipeId;
        return $this->apiRecipeId;
    }
    
    public function update($id){
        $this->apiIngredientId = $id;
        return $this->apiIngredientId;
    }

    public function goBack(){
        $this->apiIngredientId = "";
        return $this->apiIngredientId;
    }
}

    

        
