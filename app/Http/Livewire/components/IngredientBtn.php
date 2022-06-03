<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Ingredients_user;
use Illuminate\Support\Facades\Auth;


class IngredientBtn extends Component
{
    public $apiIngredientId;
    public $btnRole;
    public $name;
    public $units;

    protected $listeners =[
        'ingredientInfo'=>'update',
        'ingredientName'=>'updateName',
        'ingredientUnits'=>'updateUnit',
        'refreshParent'=>'$refresh',
    ];
   


    public function mount($btnRole,$apiIngredientId,$name,$units){
    }

    public function render()
    {
        return view('livewire.components.ingredient-btn');
    }
  
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;
        return $this->apiIngredientId;
    }
    public function updateName($ingredientName){
        
        $this->name=$ingredientName;
        return $this->name;
    }
    public function updateUnit($ingredientUnits){
        
        $this->units=$ingredientUnits;
        return $this->units;
    }

    // public function updateName($ingredientName,$myIngredientsId){
    //     $this->getMyIngredientInfo($myIngredientId);
    //     $this->name=$ingredientName;
    //     return $this->name;
    // }

    // public function getMyIngredientInfo($id){
    //     $this->myIngredient = DB::table('ingredients_users') ->where('id',$id)->get();
    //     return $this->myIngredient;
    // }
}
