<?php

namespace App\Http\Livewire\ingredients;

use Livewire\Component;
use App\Models\Ingredient;
use DB;

class AllIngredients extends Component
{
    public $alphabets=['A','B','C','D','E','F','G','H','I','J','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y'];
    public $alphabet;
    public $ingredientsAlphabetically; 
    
    // Get all ingredients when the component is first mounted
        public function mount(){
            $this->getIngerdients();
        }
   
    // Get all ingredients from the Database 
        public function getIngerdients(){
            $this->ingredientsAlphabetically = DB::table('ingredients')->get();
        }

    // Get all ingredients by alphabet
        public function getIngerdientsAlphabetically($alphabet){
            $this->ingredientsAlphabetically = DB::table('ingredients')->where('name','like',$alphabet.'%')->orderBy('name')->get();
            $this->alphabet=$alphabet;
            return $this->alphabet;
        }

    // Get information about an ingredient
        public function ingredientInfo($apiIngredientId){
            $this->emit('emitApiIngredientId',$apiIngredientId);
            $this->getIngerdientsAlphabetically($this->alphabet);
        }  
}
