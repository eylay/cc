<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function make($array)
    {
        $transaction = new self;
        $transaction->customer_id = $array['cid'];
        $transaction->gift_amount = $array['transaction_gift_amount'];
        $transaction->gift_spent = $array['transaction_gift_spent'];
        $transaction->received_amount = $array['transaction_received_amount'];
        $transaction->payable_amount = $array['transaction_payable_amount'];
        $transaction->discount_amount = $array['transaction_discount_amount'];
        $transaction->total_amount = $array['transaction_total_amount'];
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
