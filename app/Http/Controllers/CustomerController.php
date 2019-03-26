<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        dd('index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // ولیدیت کردن اطلاعات فرم
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'mobile' => 'required|string|digits:11|unique:users,mobile',
            'birthday' => 'nullable',
            'male' => 'nullable',
        ]);

        // ایجاد حساب کاربری برای مشتری
        $password = rand(10000000, 99999999);
        $new_user = User::new_user($request->name, $request->mobile, $password);

        // ثبت مشتری در دیتابیس
        $new_customer = Customer::make($new_user->id, $request->birthday, $request->male);

        // ارسال پیامک به مشتری و اطلاع رسانی
        $message_body = "
            با سلام به با شگاه مشتریان ما خوش آمدید. اطلاعات لازم برای ورود به حساب کاربری شما به صورت زیر است:\n
            نام کاربری : $new_user->mobile\n
            رمز عبور : $password\n
            کد مشتری : $new_customer->code\n
            لطفا پس از ورود به حساب کاربری رمز عبور خود را تغییر دهید.
            "; // TODO: داینامیک کردن متن پیام ها
        TextMessageController::send($new_user->mobile, $message_body);

        // اتمام عملیات
        return redirect('customers')->withMessage("مشتری مورد نظر در سیستم ثبت شد.");

    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
