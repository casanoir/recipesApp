<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Ingredients_user;
use Illuminate\Support\Facades\Auth;


class IngredientBtn extends Component
{
    public $btnAction;
    public $name;

    protected $listeners =[
        'ingredientName'=>'update',
    ];
   
    // render the  component with parameter btnAction
    public function render()
    {
        return view('livewire.components.ingredient-btn',['btnAction'=>$this->btnAction]);
    }
   // Update Method nested with Ingredient Info Blade -> update Action
    public function update($ingredientName){
        $this->name=$ingredientName;
        return $this->name;
    }
  
}
