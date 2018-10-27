<?php

namespace App\Http\Controllers\Other;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneratePassword extends Controller
{
    /**
     * Alphabet string
     *
     * @var string
     */
    private $alphabet;

    /**
     * Length of the password
     *
     * @var integer
     */
    private $length;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($length)
    {
        $this->alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $this->length = $length;
    }

    /**
     * Generate a random password
     *
     * @return string
     */
    public function password() 
    {
        return substr(str_shuffle($this->alphabet), 0, $this->length);
    }
}
