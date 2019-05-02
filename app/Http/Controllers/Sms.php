<?php

namespace App\Http\Controllers;

use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class Sms extends Controller
{

    public static function send()
    {
        try{
            $sender = "";
            $message = "send from laravel";
            $receptor = "09185567663";
            $result = Kavenegar::Send($sender,$receptor,$message);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }

    public static function sendarray()
    {
        try{
            $sender =  array("");
            $message =  array("");
            $receptor = array("");
            $result = Kavenegar::SendArray($sender,$receptor,$message);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }

    public static function verification()
    {
        try{
            $receptor =  "";
            $template =  "";
            $type =  "sms";
            $token =  "";
            $token2 =  "";
            $token3 =  "";
            $result = Kavenegar::VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }
}
