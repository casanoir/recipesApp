<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SearchBar extends Component
{
    public $searchQuery="";
    
    

    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
