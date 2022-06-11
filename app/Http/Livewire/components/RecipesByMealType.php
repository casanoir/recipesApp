<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecipesByMealType extends Component
{
    public $recipesByMealType;

    public function mount()
    {
        $this->getRecipesByMealType();
        dd($this->recipesByMealType);
    }

    public function render()
    {
        return view('livewire.components.recipes-by-meal-type');
    }
    
    
    // Get all available information about an ingredient
    public function getRecipesByMealType(){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 1,
            'tags' => 'dessert',
        ]);
        $this->recipesByMealType = $response->json();
        return $this->recipesByMealType;

    }
}
