<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use DB;

class AllIngredients extends Component
{
    
    public $alphabets=['A','B','C','D','E','F','G','H','I','J','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y'];
    public $ingredientsAlphabetically;
    public $ingredient;
    
    protected $listeners =['ingredientInfo'=>'$refresh'];

    public function render()
    {
        
        return view('livewire.all-ingredients');
    }
   
    public function mount()
    {
        $this->ingredientsAlphabetically = DB::table('ingredients')->get();
    }

    
    public function getIngerdientsAlphabetically($alphabet)
    {
        $this->ingredientsAlphabetically = DB::table('ingredients')->where('name','like',$alphabet.'%')->orderBy('name')->get();
        
    }
    public function ingredientInfo($apiIngredientId){

        $this->apiIngredientId=$apiIngredientId;
        dd($this->apiIngredientId);
        $this->emit('ingredientInfo');
        
        // $this->ingredient=$ingredient;
        // $this->ingredientName=$ingredientName;
        // $this->ingredientsAlphabetically = DB::table('ingredients')->where('name','like',$ingredient.'%')->orderBy('name')->get();
        // $this->emit('ingredientInfo',$this->apiIngredientId);

    }
    
}
