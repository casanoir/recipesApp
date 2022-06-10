<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AboutController extends Controller
{
    public $teamMembers;

    public function index()
    {
        $this->teamMembers = DB::table('team_members')->get();
            return view('pages.about',['teamMembers' => $this->teamMembers]);

    }


}
