<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class FavoritesRec extends Component
{
    protected $listeners =[
        'emitDislike'=>'$refresh'
    ];
    public function render()
    {
        $userFavoriteRecipes=DB::table('favorite_recipes')
                ->where('user_id',Auth::user()->id)
                ->orderBy('favorite_recipes.created_at')->get();
        return view('livewire.home.favorites-rec', [
            'userFavoriteRecipes' => $userFavoriteRecipes
        ]);
    }
    public function removeFromFavorite($recipeId){
        //delete movie id from this user's favorites
        DB::table('favorite_recipes')->where('user_id',Auth::id())->where('recipe_id', $recipeId)->delete();
    }
}
