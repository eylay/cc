<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'mobile', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unverify_mobile()
    {
        $this->mobile_verified_at = null;
        $this->save();
    }

    public function update_password($string)
    {
        $this->password = bcrypt($string);
        $this->save();
    }

    public static function new_user($name, $mobile, $password)
    {
        $user = new self;
        $user->name = $name;
        $user->mobile = $mobile;
        $user->password = bcrypt($password);
        $user->mobile_verified_at = now();
        $user->save();
        return $user;
    }
}
