<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // return view
    public function dashboardIngredients()
    {
        return view('dashboard.ingredients');
    }
}
