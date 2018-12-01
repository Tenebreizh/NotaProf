<?php

namespace App\Http\Controllers;

use App\Appreciation;
use App\Category;

class AdministrationController extends Controller
{
    public function index()
    {
        return view('administration')
                ->with('appreciations', Appreciation::all())
                ->with('categories', Category::all());
    }
}
