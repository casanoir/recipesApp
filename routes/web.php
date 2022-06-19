<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\AboutController;

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



Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Auth::routes();

Route::get('/home', [HomeController::class, 'dashboardHome'])->name('home');


Route::controller(RecipesController::class)->group(function () {
    Route::get('/recipes', 'dashboardRecipes')->name('recipes');
    Route::get('/recipe/{recipeId}', 'dashboardShowRecipe')->name('showRecipe');
    Route::get('/recipe/{recipeId}/{ingredientName}', 'dashboardShowRecipeIngredientInfo')->name('showRecipeIngredientInfo');
});


Route::get('/ingredients', [IngredientController::class, 'dashboardIngredients'])->name('ingredients');
