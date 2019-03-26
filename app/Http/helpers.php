<?php

function user_type()
{
    $user = auth()->user();
    return $user ? ($user->admin ? 'admin' : 'customer') : '';
}

function random_string($length)
{
    return substr(str_shuffle(str_repeat(
        $x='123456789ABCDEFGHJKMNPQRSTUVWXYZ', ceil($length/strlen($x))
    )),1,$length);
}
