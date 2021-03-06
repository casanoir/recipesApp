<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class FavIngredientsBtn extends Component
{
    public $userFavoriteIngredients=[];
    public $ingredientId;
    public $liked;

    public function mount($apiIngredientId)
    {
        //make DB call using the apiID to get our databaseID of that ingredient
        $this->ingredientId = DB::table('ingredients')->where('apiIngredientId','like',$apiIngredientId)->value('id');
        //make DB call to check if this recipe is already favorited
        $this->userFavoriteIngredients = DB::table('favorite_ingredients')->where('user_id',Auth::id())->pluck('ingredient_id')->toArray();
        if (in_array($this->ingredientId, $this->userFavoriteIngredients)){
            $this->liked=true;
        }
        else{
            $this->liked=false;
        }
        
    }

    public function addToFavorite($ingredientId){

        $this->data=[
            'user_id' => Auth::id(),
            'ingredient_id' => $ingredientId,
        ];
        DB::table('favorite_ingredients')->insertOrIgnore($this->data);
        $ingredientId = null;
        $this->liked=true;
    }

    public function removeFromFavorite($ingredientId){
        DB::table('favorite_ingredients')->where('user_id',Auth::id())->where('ingredient_id', $ingredientId)->delete();
        //update favorite ingredient component, needed to dynamically update view
        $this->emit('emitDislike');

        $ingredientId = null;
        $this->liked=false;

    }
}
