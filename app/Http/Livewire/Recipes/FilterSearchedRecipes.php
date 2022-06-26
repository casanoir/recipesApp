<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilterSearchedRecipes extends Component
{
    public $searchedQuery;
    
    public function mount($searchQuery){
        $this->searchedQuery = $searchQuery;
        return $this->searchedQuery;
    }
}
