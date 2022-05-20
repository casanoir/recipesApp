<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        return view('dashboard.home');
    }
    public function indexRecipes()
    {
        return view('dashboard.recipes');
    }
    public function indexIngredients()
    {
        return view('dashboard.ingredients');
    }
    public function indexAbout()
    {
        return view('dashboard.about');
    }
}
