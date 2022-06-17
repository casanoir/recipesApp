<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MyRecipes extends Component
{
  
    public function render()
    {
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/findByIngredients?', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'number'=>8,
            'ingredients'=>"milk ,flour ,sugar ,",
        ]);
        
        $this->ingredientRecipes = $response->json();
        return view('livewire.recipes.my-recipes',['ingredientRecipes'=>$this->ingredientRecipes]);
    }
    
}
