<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/recipes', [App\Http\Controllers\HomeController::class, 'indexRecipes'])->name('recipes');
Route::get('/ingredients', [App\Http\Controllers\HomeController::class, 'indexIngredients'])->name('ingredients');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'indexAbout'])->name('about');
