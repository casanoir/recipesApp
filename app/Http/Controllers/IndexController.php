<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index()
    {
        if (!isset(Auth::user()->id)){
            return view('pages.index');
        }
        else{
            return view('pages.dashboard.home');  
        }

    }


}
