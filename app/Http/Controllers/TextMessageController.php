<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TextMessage;

class TextMessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $messages = TextMessage::latest()->paginate(25);
        return view('text_messages.index', compact('messages'));
    }

    public function destroy(TextMessage $message)
    {
        $message->delete();
        return back()->withMessage('پیامک مورد نظر حذف شد.');
    }

    public static function send($mobile, $body)
    {
        Sms::send($body,$mobile);
        TextMessage::create([
            'mobile' => $mobile,
            'body' => $body,
        ]);

    }
}
