<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function make($customer_id=0)
    {
        $transaction = new self;
        $transaction->customer_id = $customer_id;
        $transaction->save();
        return $transaction;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
