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
    public $recipeName;
    public $recipeImage;
    public $liked;

    public function mount($recipe)
    {
        // dd($recipe['image']);
        $this->recipeId=$recipe['id'];
        $this->recipeName=$recipe['title'];
        $this->recipeImage=$recipe['image'];
        //make DB call to check if this recipe is already favorited
        $this->userFavoriteRecipes = DB::table('favorite_recipes')->where('user_id',Auth::id())->pluck('recipe_id')->toArray();
        if (in_array($this->recipeId, $this->userFavoriteRecipes)){
            $this->liked=true;
        }
        else{
            $this->liked=false;
        }
        
    }
    public function addToFavorite($recipeId){

        $this->data=[
            'user_id' => Auth::id(),
            'recipe_id' => $this->recipeId,
            'name' => $this->recipeName,
            'image' => $this->recipeImage,
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
