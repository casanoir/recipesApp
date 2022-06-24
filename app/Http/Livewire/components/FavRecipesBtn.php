<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\FavoriteRecipes;
use Illuminate\Support\Facades\Auth;
use DB;
class FavRecipesBtn extends Component
{
    public $userFavoriteRecipes=[];
    public $recipeId;
    public $liked;

    public function mount($recipeId)
    {
        $this->recipeId=$recipeId;
        //make DB call to check if this recipe is already favorited
        $this->userFavoriteRecipes = DB::table('favorite_recipes')->where('user_id',Auth::id())->pluck('recipe_id')->toArray();
        if (in_array($recipeId, $this->userFavoriteRecipes)){
            $this->liked=true;
        }
        else{
            $this->liked=false;
        }
        
    }
    public function addToFavorite($recipeId){

        $this->data=[
            'user_id' => Auth::id(),
            'recipe_id' => $recipeId,
        ];
        FavoriteRecipes::create($this->data
        );
        $recipeId = null;
        $this->liked=true;
    }

    public function removeFromFavorite($recipeId){
        //delete movie id from this user's favorites
        DB::table('favorite_recipes')->where('user_id',Auth::id())->where('recipe_id', $recipeId)->delete();
        $recipeId = null;
        $this->liked=false;
    }
}
