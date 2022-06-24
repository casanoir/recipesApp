<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeEquipments extends Component
{
    public $recipeId ;
    public $recipeEquipments ;
    
    
    public function mount($recipeId){
        $this->getRecipeEquipments($recipeId);
    }
    // Get Recipe Information
    public function getRecipeEquipments( $recipeId){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/'.$recipeId.'/equipmentWidget.json', [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
        ]);
        $this->recipeEquipments = $response->json();     
        // dd($this->recipeEquipments['equipment']);  
        return $this->recipeEquipments;
    }

}
