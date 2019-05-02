<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $data = $request->validate([
            'discount_percent' => 'required|integer|between:0,100',
            'gift_percent' => 'required|integer|between:0,100',
        ]);
        $setting->update($data);
        return back()->withMessage("تغییرات ذخیره شد.");
    }
}
