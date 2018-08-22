<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Drink;

class HighscoreController extends Controller
{
    public function index() {
        $users = User::all()->map(function($user) {
            $drinks = $user->drinks;
            $totalAmountMl = $drinks->reduce(function($total, $drink) { return $total + $drink->amount; }, 0);
            $totalAmountAlcoholMl = $drinks->reduce(function($total, $drink) {
                return $total + (($drink->amount / 100) * doubleval($drink->alcohol));
            }, 0);
            $totalAmountAlcoholMl = round($totalAmountAlcoholMl);

            return (object)[
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'age' => $user->age,
                'drinks' => count($drinks),
                'total_amount_ml' => $totalAmountMl,
                'total_amount_alcohol_ml' => $totalAmountAlcoholMl
            ];
        });

        $users = $users->sortByDesc('total_amount_alcohol_ml')->values()->all();

        return view('highscores.index')->with(['users' => $users]);
    }

    public function saveDrink(Request $request) {
        $rules = [
            'user_id' => 'required|integer',
            'name' => 'required|string|min:2',
            'amount' => 'required|numeric|min:20',
            'alcohol' => 'required|numeric|min:2|max:100'
        ];

        $messages = [
            'user_id.required' => 'Please select a user',
            'user_id.integer' => 'Invalid user',
            'name.required' => 'Please enter a name for your drink',
            'name.string' => 'Please enter a valid name for your drink',
            'name.min' => 'Your drinks name must have at least 2 characters',
            'amount.required' => 'Please enter the amount you want to drink',
            'amount.numeric' => 'Still okay drinking? Don\'t think so',
            'amount.min' => 'Is your drink really that hard?',
            'alcohol.required' => 'Let us know what a man you are',
            'alcohol.numeric' => 'Are you sure this is a valid alcohol content?',
            'alcohol.min' => 'What is this? I don\'t consider your drink as the right one for this game',
            'alcohol.max' => 'Don\'t you think you\'re going a little too far?'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()
                ->route('highscores.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            $drink = new Drink();
            $drink->name = $request->name;
            $drink->amount = $request->amount;
            $drink->alcohol = $request->alcohol;

            $user = User::findOrFail($request->user_id);
            $user->drinks()->save($drink);

            return redirect()->route('highscores.index');
        }
    }
}
