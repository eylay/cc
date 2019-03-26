<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = ['male', 'birthday'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->male ? "آقا" : "خانم";
    }

    public static function make($user_id, $birthday=null, $male=true)
    {
        $code = random_string(6);
        $customer = new self;
        $customer->user_id = $user_id;
        $customer->birthday = shamsi_to_miladi($birthday);
        $customer->code = $code;
        $customer->male = $male;
        $customer->save();
        return $customer;
    }
}
