<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MyRecipes extends Component
{
    public $ingredientRecipes;
  public function mount($selectedIngNames){
    $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/findByIngredients?', [
        'apiKey'=>env('SPOONACULAR_API_KEY'),
        'number'=>4,
        'ingredients'=>$selectedIngNames,
    ]);
    $this->ingredientRecipes = $response->json();
    return $this->ingredientRecipes;

  }
    
}
