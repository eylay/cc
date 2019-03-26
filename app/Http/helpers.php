<?php

function user_type()
{
    $user = auth()->user();
    return $user ? ($user->admin ? 'admin' : 'customer') : '';
}
