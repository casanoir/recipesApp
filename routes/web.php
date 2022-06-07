<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','pages.index');
Route::view('/about', 'pages.about')->name('about');


Auth::routes();

Route::get('/home', [AppController::class, 'dashboardHome'])->name('home');


Route::controller(RecipesController::class)->group(function () {
    Route::get('/recipes', 'dashboardRecipes')->name('recipes');
    Route::get('/recipe/{recipeId}', 'dashboardShowRecipe')->name('showRecipe');
});


Route::get('/ingredients', [IngredientController::class, 'dashboardIngredients'])->name('ingredients');
