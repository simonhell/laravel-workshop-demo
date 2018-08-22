<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HighscoreController extends Controller
{
    public function index() {
        return view('highscores.index')->with(['users' => User::all()]);
    }
}
