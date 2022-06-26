<?php

namespace App\Http\Livewire\Recipes;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecipesByMealType extends Component
{
    public $recipesByMealType;
    public $mealType="main course";

    protected $listeners =[
        // Meal Types
        'emitMealTypeName'=>'update',
    ];

    public function mount()
    {
        $this->getRecipesByMealType();
    }

    public function render()
    {
        return view('livewire.recipes.recipes-by-meal-type');
    }
    
    //Get random recipes from the selected meal type when one is clicked
    public function update($name){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 1,
            'tags' => $name,
        ]);
        $this->recipesByMealType = $response->json();
        $this->mealType=$name;
        return $this->recipesByMealType;
    }

    //Get random recipes from meal type "main course" on page load
    public function getRecipesByMealType(){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 1,
            'tags' => 'main course',
        ]);
        $this->recipesByMealType = $response->json();
        return $this->recipesByMealType;

    }
}
