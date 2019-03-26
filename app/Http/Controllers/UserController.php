<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function acc()
    {
        $user = auth()->user();
        return view('users.acc', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:200',
            'mobile' => 'required|string|digits:11',
            'new_password' => 'nullable|string|min:8|max:40',
            'current_password' => 'required',
        ]);

        

    }
}
