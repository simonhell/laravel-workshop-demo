<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Drink;

class HighscoreController extends Controller
{
    public function index() {
        return view('highscores.index')->with(['users' => User::all()]);
    }

    public function saveDrink(Request $request) {
        $drink = new Drink();
        $drink->name = $request->name;
        $drink->amount = $request->amount;
        $drink->alcohol = $request->alcohol;

        $user = User::findOrFail($request->user_id);
        $user->drinks()->save($drink);

        return redirect()->route('highscores.index');
    }
}
