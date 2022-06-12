<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use DB;

class MealTypes extends Component
{
    public $meal;

    public function mount()
    {
        $this-> meal= DB::table('meal_types')->get('name');
            return $this->meal;

    }

}
