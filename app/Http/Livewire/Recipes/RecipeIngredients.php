<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;


class RecipeIngredients extends Component
{
    protected $listeners =['extendedIngredients'=>'update'];
    public $extendedIng;
    
    public function update($data){
        $this->extendedIng=$data;
        // return $this->extendedIng;
    }
}
