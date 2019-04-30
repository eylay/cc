<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function make($customer_id=0, $gift_amount=0)
    {
        $transaction = new self;
        $transaction->customer_id = $customer_id;
        $transaction->gift_amount = $gift_amount;
        $transaction->save();
        return $transaction;
    }

    public function total_discount()
    {
        return Item::where('transaction_id', $this->id)->sum(\DB::raw('cash_discount_with_count + club_discount'));
    }

    public function total_payable()
    {
        return Item::where('transaction_id', $this->id)->sum('payable_amount');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
