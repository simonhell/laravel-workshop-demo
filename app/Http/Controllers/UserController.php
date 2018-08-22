<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        return view('users.index')->with(['users' => User::all()]);
    }

    public function edit($id) {
        return view('users.edit')->with(['user' => User::findOrFail($id)]);
    }

    public function store(Request $request) {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->save();

        return redirect()->route('users.index');
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
