<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboardRecipes()
    {
        return view('dashboard.recipes.recipes');
    }

    public function dashboardShowRecipe($recipeId)
    {
        return view('dashboard.recipes.show-recipe',compact('recipeId'));
    }

    

}
