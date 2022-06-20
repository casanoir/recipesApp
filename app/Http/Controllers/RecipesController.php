<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        return view('pages.dashboard.recipes.recipes');
    }

    public function dashboardShowRecipe($recipeId)
    {
        
        return view('pages.dashboard.recipes.show-recipe',compact('recipeId'));
    }
   
    public function dashboardShowRecipeIngredientInfo($recipeId,$ingredientName)
    {
        $apiIngredientId= DB::table('ingredients')->where('name',$ingredientName)->value('apiIngredientId');
        
        return view('pages.dashboard.recipes.show-recipe-ingredient-info',compact('recipeId','apiIngredientId'));
    }

    

}
