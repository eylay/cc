<?php

function user_type()
{
    $user = auth()->user();
    return $user ? ($user->admin ? 'admin' : 'customer') : '';
}

function admin()
{
    $user = auth()->user();
    return $user && $user->admin;
}

function current_customer()
{
    $user = auth()->user();
    return $user && !$user->admin ? $user->customer : null;
}

function shamsi_to_miladi($string, $sep='/')
{
    if ($string) {
        $array = explode($sep, $string);
        $date = new \Morilog\Jalali\Jalalian($array[0], $array[1], $array[2]);
        return $date->toCarbon();
    }else {
        return null;
    }
}

function carbon_to_jdate($carbon) {
    return \Morilog\Jalali\Jalalian::fromDateTime($carbon);
}

function print_date($carbon)
{
    $jDate = carbon_to_jdate($carbon);
    return $jDate->format('%A, %d %B %y');
}

function pdp($carbon)
{
    $jDate = carbon_to_jdate($carbon);
    return $jDate->format('%Y/%m/%d');
}

function random_string($length)
{
    return substr(str_shuffle(str_repeat(
        $x='123456789ABCDEFGHJKMNPQRSTUVWXYZ', ceil($length/strlen($x))
    )),1,$length);
}
