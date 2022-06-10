<?php

namespace App\Http\Livewire\Ingredients;


use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class ShowIngredient extends Component
{
    public $apiIngredientId;
        
    protected $listeners =[
        // allIngredients
        'emitApiIngredientId'=>'update'
    ];

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        $this->apiIngredientId=$apiIngredientId;
        return $this->apiIngredientId;    
    }

    
    
    
    public function render()
    {
        return view('livewire.ingredients.show-ingredient');
    }
    
  
}
