<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class FavoritesIng extends Component
{
    protected $listeners =[
        'emitDislike'=>'$refresh'
    ];
    public function render()
    {
        $userFavoriteIngredients=DB::table('favorite_ingredients')
                ->where('user_id',Auth::user()->id)
                ->join('ingredients', 'ingredients.id', '=', 'favorite_ingredients.ingredient_id')
                ->orderBy('favorite_ingredients.created_at')->get();
        return view('livewire.home.favorites-ing', [
            'userFavoriteIngredients' => $userFavoriteIngredients
        ]);
    }
}
