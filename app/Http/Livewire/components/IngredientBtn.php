<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Ingredients_user;

class IngredientBtn extends Component
{
    public $apiIngredientId;
    public $btnRole;
    public $name;
    public $units;

    protected $listeners =['ingredientInfo'=>'$refresh'];

    public function mount($btnRole,$apiIngredientId,$name,$units){
    }

    public function render()
    {
        return view('livewire.components.ingredient-btn');
    }
  
}
