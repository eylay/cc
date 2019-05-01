<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $customers = Customer::latest()->paginate(25);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer;
        return view('customers.create', compact('customer'));
    }

    public function store(Request $request)
    {
        // ولیدیت کردن اطلاعات فرم
        self::validation();

        // ایجاد حساب کاربری برای مشتری
        $password = rand(10000000, 99999999);
        $new_user = User::new_user($request->name, $request->mobile, $password);

        // ثبت مشتری در دیتابیس
        $new_customer = Customer::make($new_user->id, $request->birthday, $request->male, $request->credit);

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
        return view('customers.create', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $user = $customer->user;
        self::validation($user->id);
        $user->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
        ]);
        if ($request->male !== null) {
            $data['male'] = $request->male;
        }
        $data['birthday'] = shamsi_to_miladi($request->birthday);
        $customer->update($data);
        return back()->withMessage("مشتری مورد نظر ویرایش شد.");
    }

    public function destroy(Customer $customer)
    {
        $user = $customer->user;
        $user->delete();
        $customer->delete();
        return back()->withMessage("مشتری مورد نظر از سیستم حذف شد و حساب کاربری وی نیز حذف شد.");
    }

    public static function validation($user_id=0)
    {
        return request()->validate([
            'name' => 'required|string|min:3|max:200',
            'mobile' => 'required|string|digits:11|unique:users,mobile,'.$user_id,
            'credit' => 'nullable',
            'birthday' => 'nullable',
            'male' => 'nullable',
        ]);
    }
}
