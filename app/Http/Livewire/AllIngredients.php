<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use DB;

class AllIngredients extends Component
{
    
    public $alphabet;
    public $alphabets=['A','B','C','D','E','F','G','H','I','J','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    public $ingredientsAlphabetically;
    public $apiIngredientId;
    
    

    public function render()
    {
        // $this->ingredientsAlphabetically =Ingredient::all()->get();
        return view('livewire.all-ingredients');
    }
   
    public function mount($alphabet)
    {
        $this->alphabet=$alphabet;
        $this->getIngerdientsAlphabetically ($alphabet);
    }

    
    public function getIngerdientsAlphabetically($alphabet)
    {
        $this->ingredientsAlphabetically = DB::select("select * from ingredients where name LIKE '$alphabet%' order by name");
        
    }
    public function ingredientsInfo($apiIngredientId){
        $this->apiIngredientId=$apiIngredientId;
        dd($this->apiIngredientId);
    }
    
}
