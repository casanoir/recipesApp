<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use DB;

class MealTypes extends Component
{
   

    public function render()
    {
        // $mealtypes = \App\Models\MealType::get();
        $mealtypes= DB::table('meal_types')->get();
        return view('livewire.components.meal-types',['mealtypes'=>$mealtypes]);
    }
    

   
 

}
