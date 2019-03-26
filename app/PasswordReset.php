<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PasswordReset extends Model
{
    public $timestamps = false;

    public static function make($user)
    {
        // پاک کردن کدهای ارسالی قبلی برای این شماره تماس
        self::where('mobile', $user->mobile)->delete();

        // ثبت رکورد جدید
        $pr = new self;
        $pr->mobile = $user->mobile;
        $pr->token = rand(100000, 999999);
        $pr->created_at = Carbon::now();
        $pr->save();
        return $pr;
    }

    public static function check($mobile)
    {
        $found = self::where('mobile', $mobile)->where('created_at', '>', now()->subMinutes(2) )->first();
        return !$found;
    }
}
