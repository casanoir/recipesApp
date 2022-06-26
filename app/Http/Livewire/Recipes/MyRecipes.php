<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MyRecipes extends Component
{
  public $ingredientRecipes;

  //make api call to recipes with the selected ingredients from the user's list
  public function mount($selectedIngNames){
    $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/findByIngredients?', [
        'apiKey'=>env('SPOONACULAR_API_KEY'),
        'number'=>8,
        'ingredients'=>$selectedIngNames,
    ]);

    $this->ingredientRecipes = $response->json();
    return $this->ingredientRecipes;

  }
    
}
