<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public static function make($user_id, $birthday=null, $male=true)
    {
        $code = random_string(6);
        $customer = new self;
        $customer->user_id = $user_id;
        $customer->birthday = now(); // FIXME: convert persian date to Miladi date
        $customer->code = $code;
        $customer->male = $male;
        $customer->save();
        return $customer;
    }
}
