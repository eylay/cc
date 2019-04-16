<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Customer;
use App\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $transactions = Transaction::paginate(20);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $transaction = new Transaction;
        $customers = Customer::all();
        return view('transactions.create', compact('transaction', 'customers'));
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $transaction = Transaction::make();
        $result = [];
        foreach ($inputs as $key => $array) {
            if(is_array($array) && count($array)){
                foreach ($array as $i => $value) {
                    $result[$i][$key] = $value;
                    $result[$i]['created_at'] = Carbon::now();
                    $result[$i]['updated_at'] = Carbon::now();
                    $result[$i]['transaction_id'] = $transaction->id;
                }
            }
        }
        Item::insert($result);

        return redirect('transactions')->withMessage("تراکنش با موفقیت در سیستم ثبت شد.");
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
