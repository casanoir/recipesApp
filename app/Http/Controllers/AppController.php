<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
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
    public function dashboardHome()
    {
        return view('dashboard.home');
    }
    public function dashboardRecipes()
    {
        return view('dashboard.recipes.recipes');
    }
    public function dashboardShowRecipe($recipeId)
    {
        return view('dashboard.recipes.show-recipe',compact('recipeId'));
    }
    public function dashboardIngredients()
    {
        return view('dashboard.ingredients');
    }
}