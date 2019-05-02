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

    public function name()
    {
        return $this->user->name ?? '';
    }

    public function mobile()
    {
        return $this->user->mobile ?? '';
    }

    public function increase_credit($amount)
    {
        $this->credit += $amount;
        $this->save();
    }

    public function reduce_credit($amount)
    {
        $this->credit -= $amount;
        $this->save();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function make($user_id, $birthday=null, $male=true, $credit=0)
    {
        $code = random_string(6);
        $customer = new self;
        $customer->user_id = $user_id;
        $customer->birthday = shamsi_to_miladi($birthday);
        $customer->code = $code;
        $customer->male = $male;
        $customer->credit = $credit;
        $customer->save();
        return $customer;
    }
}
