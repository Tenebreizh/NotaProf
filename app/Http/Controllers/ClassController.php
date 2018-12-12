<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();

        return view('classes.index', [
            'classes' => $classes,
        ]);
    }

    
}
