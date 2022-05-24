<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IngredientInfo extends Component
{
    public $apiIngredientId;
    protected $listeners =['ingredientInfo'=>'getIngredientInfo'];
    public function render()
    {
        return view('livewire.ingredient-info');
    }
    public function getIngredientInfo(){
        $this->apiIngredientId=2;
        
    }
}
