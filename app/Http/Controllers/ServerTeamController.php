<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class ServerTeamController extends Controller 
{
    public function index()
    {
        return view('ServerTeam.index');
    }
}