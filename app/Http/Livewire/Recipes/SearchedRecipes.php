<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchedRecipes extends Component
{
    public $searchedQuery;
    public $searchedParameters=[];
    public $searchedRecipes;

    protected $listeners =[
        'filerSearchParameters'=>'update',
        
    ];
    
    public function mount($searchQuery){
        $this->searchedQuery = $searchQuery;
        $this->searchedParameters = [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'query'=>$searchQuery,
            'number'=>10,
        ];
        $this->getSearchedRecipes($this->searchedParameters);
    }
    // Get Recipe Information
    public function getSearchedRecipes( $searchedParameters){
        $response = Http::acceptJson()->get('https://api.spoonacular.com/recipes/complexSearch?',$searchedParameters );
        $this->searchedRecipes = $response->json();
        
        return $this->searchedRecipes;
    }
    public function update($searchFilterParameters){
        // dd($this->searchedQuery,$searchFilterParameters);
       
        $this->searchedParameters = [
            'apiKey'=>env('SPOONACULAR_API_KEY'),
            'query'=>$this->searchedQuery,
            'number'=>10,
        ];
        foreach ($searchFilterParameters as $key => $value){
            $this->searchedParameters += [ $key => $value ];
        }
        $this->getSearchedRecipes($this->searchedParameters);
    }
}
