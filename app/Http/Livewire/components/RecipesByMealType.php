<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecipesByMealType extends Component
{
    public $recipesByMealType;

    protected $listeners =[
        // Meal Types
        'emitMealTypeName'=>'update',
      
    ];

    public function mount()
    {
        $this->getRecipesByMealType();
//    dd($recipesByMealType['recipes'][0]->title) 
        // dd($this->recipesByMealType['recipes'][0]['id']);
        // dd($this->recipesByMealType['recipes'][0]['dishTypes']);
    }

    public function render()
    {
        return view('livewire.components.recipes-by-meal-type');
    }
    
    public function update($name){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 5,
            'tags' => $name,
        ]);
        $this->recipesByMealType = $response->json();
        return $this->recipesByMealType;
    }
    // Get all available information about an ingredient
    public function getRecipesByMealType(){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/random?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number' => 5,
            'tags' => 'main course',
        ]);
        $this->recipesByMealType = $response->json();
        return $this->recipesByMealType;

    }
}
