<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class IngredientInfo extends Component
{
    
    public $apiIngredientId;
    public $ingredientData;
    public $ingredientSubstitutes;
    
    protected $listeners =['ingredientInfo'=>'update'];
    
    public function render()
    {
        return view('livewire.ingredient-info');
    }

    // Get all available information about an ingredient
    public function getIngredientInfo($id){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/food/ingredients/'.$id.'/information?', [
            'apiKey'=>env('CLIENT_API_KEY'),
            'amount' => 1,
        ]);
        $this->ingredientData = $response->json();
        return $this->ingredientData;
    }

    // Search for substitutes for a given ingredient.
    public function getIngredientSubstitutes($id){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/food/ingredients/'.$id.'/substitutes', [
            'apiKey'=>env('CLIENT_API_KEY'),
        ]);
        $this->ingredientSubstitutes = $response->json();
        return $this->ingredientSubstitutes;
    }

    // Update Method nested with AllIngredients Blade ->Btn show ingeredient info
    public function update($apiIngredientId){
        
        $this->apiIngredientId=$apiIngredientId;

        $this->getIngredientInfo($apiIngredientId);
        
        $this->getIngredientSubstitutes($apiIngredientId);
        
    }

}

