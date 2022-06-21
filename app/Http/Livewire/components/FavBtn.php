<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\FavoriteIngredients;
use DB;

class FavBtn extends Component
{
    public $recieId;
    public $ingredientId;
    
    public function mount($recipeOrIgredientId,$btnName){
        if($btnName == "recipe"){
            $this->recieId=$recipeOrIgredientId;
            // dd($this->recieId);
            return $this->recieId;
        }
        else{
            $this->ingredientId=$recipeOrIgredientId;
            // dd($this->ingredientId);

            return $this->ingredientId;

        }

    }
    public function render()
    {
        return view('livewire.components.fav-btn');
    }

    public function addFavorite(){
        
    }

    public function removeFavorite(){

    }
}
