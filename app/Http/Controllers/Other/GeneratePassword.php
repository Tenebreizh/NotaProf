<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;

class GeneratePassword extends Controller
{
    /**
     * Generate a random password.
     *
     * @return string
     */
    public static function password($length)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?';

        return substr(str_shuffle($alphabet), 0, $length);
    }
}
