<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use DB;

class MealTypes extends Component
{
    public function render()
    {
        // $mealtypes = \App\Models\MealType::get();
        $mealtypes= DB::table('meal_types')->get();

        return view('livewire.recipes.meal-types',['mealtypes'=>$mealtypes]);
    }
    

   
    public function getMealTypeValue($name){
        $name = strtolower($name);
        $this->emit('emitMealTypeName',$name);
        
    }

}
