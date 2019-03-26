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
        $user = auth()->user();

        $request->validate([
            'name' => 'nullable|string|min:3|max:200',
            'mobile' => 'nullable|string|digits:11',
            'new_password' => 'nullable|string|min:8|max:40',
            'current_password' => 'required',
        ]);


        if (\Hash::check($request->current_password, $user->password)) {

            $loguot = false;

            if ($request->name) {
                $data ['name']= $request->name;
            }
            if ($request->mobile) {
                $loguot = true;
                $data ['mobile']= $request->mobile;
                $user->unverify_mobile();
            }
            if ($request->new_password) {
                $loguot = true;
                $data['password'] = bcrypt($request->new_password);
            }

            $user->update($data);

            $message = 'مشخصات شما با موفقیت ویرایش شد.';
            if ($loguot) {
                \Auth::logout();
                return redirect('login')->withMessage($message);
            }else {
                return back()->withMessage($message);
            }

        }else {
            return back()->withErrors(['رمز عبور فعلی اشتباه است.'])->withInput();
        }

    }
}
