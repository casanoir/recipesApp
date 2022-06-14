<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class RecipeCard extends Component
{
    public $recipes;
    public function mount($recipes)
    {
    return $this->recipes = $recipes;
    }
}
