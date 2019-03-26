<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\TextMessageController;
use App\User;
use App\PasswordReset;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.mobile');
    }

    public function sendRestToken()
    {
        request()->validate([
            'mobile' => 'required|exists:users,mobile'
        ]);
        $check = PasswordReset::check(request('mobile'));
        if ($check) {
            $user = User::where('mobile', request('mobile'))->first();
            $password_reset = PasswordReset::make($user);
            $body = "از کد $password_reset->token برای بازیابی رمز عبور خود استفاده کنید.";
            TextMessageController::send(request('mobile'), $body);
            return redirect('password/token');
        }else {
            return back()->withErrors(['لطفا تا 2 دقیقه دیگر مجددا امتحان کنید.'])->withInput();
        }

    }

    public function showInputCodeForm()
    {
        return view('auth.passwords.token');
    }

    public function resetPassword()
    {
        request()->validate([
            'token' => 'required',
        ]);
        $found = PasswordReset::where('token', request('token'))->first();
        if ($found) {
            return redirect( "password/reset/".request('token') );
        }else {
            return back()->withErrors(['کد وارد شده صحیح نیست.'])->withInput()->withMobile(request('mobile'));
        }
    }
}
