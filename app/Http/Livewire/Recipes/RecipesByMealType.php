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
    
    public function update($name){
        
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 1,
            'tags' => $name,
        ]);
        $this->recipesByMealType = $response->json();
        // dd($this->recipesByMealType);
        $this->mealType=$name;
        // dd($name);
        return $this->recipesByMealType;
    }
    // Get all available information about an ingredient
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
