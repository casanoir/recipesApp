<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

Route::view('/','index');
Route::view('/about', 'about')->name('about');


Auth::routes();

Route::controller(AppController::class)->group(function () {
    Route::get('/home', 'dashboardHome')->name('home');
    Route::get('/recipes', 'dashboardRecipes')->name('recipes');
    Route::get('/recipe/{recipeId}', 'dashboardShowRecipe')->name('showRecipe');
    Route::get('/ingredients', 'dashboardIngredients')->name('ingredients');
});
