<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\PasswordReset;

class ResetPasswordController extends Controller
{


    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset()
    {
        request()->validate([
            'token' => 'required',
            'password' => 'required|string|min:8|max:40|confirmed',
        ]);
        $pr = PasswordReset::where('token', request('token'))->first();
        $user = User::where('mobile', $pr->mobile)->first();
        $user->update_password(request('password'));
        return redirect('login');

    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', compact('token'));
    }
}
