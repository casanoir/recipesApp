<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class FavoritesIng extends Component
{
    protected $listeners =[
        //listens to call from components/FavIngredientsBtn
        'emitDislike'=>'$refresh'
    ];
    public function render()
    {
        //get this users favorite ingredients from database and prepare to be shown in the view
        $userFavoriteIngredients=DB::table('favorite_ingredients')
                ->where('user_id',Auth::user()->id)
                ->join('ingredients', 'ingredients.id', '=', 'favorite_ingredients.ingredient_id')
                ->orderBy('favorite_ingredients.created_at')->get();
        return view('livewire.home.favorites-ing', [
            'userFavoriteIngredients' => $userFavoriteIngredients
        ]);
    }
}
