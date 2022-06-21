<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use DB;

class BtnUseRecipe extends Component
{
    public $extendedIngredients;
    
    // public function render()
    // {
    //     return view('livewire.components.btn-use-recipe');
    // }

    public function mount($recipeIngredients)
    {
        $this->extendedIngredients=$recipeIngredients;
        return $this->extendedIngredients;
    }
  
    public function useRecipe(){
        $user_id= Auth::user()->id;
        $myIngredientsId = DB::table('ingredients_users')->where('user_id',$user_id)->pluck('ingredient_id')->toArray();
        dd($this->extendedIngredients);

    }
}
