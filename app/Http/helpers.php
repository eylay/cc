<?php

function user_type()
{
    $user = auth()->user();
    return $user ? ($user->admin ? 'admin' : 'customer') : '';
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

function print_date($carbon)
{
    $jDate = \Morilog\Jalali\Jalalian::fromDateTime($carbon);
    return $jDate->format('%A, %d %B %y');
}

function random_string($length)
{
    return substr(str_shuffle(str_repeat(
        $x='123456789ABCDEFGHJKMNPQRSTUVWXYZ', ceil($length/strlen($x))
    )),1,$length);
}
