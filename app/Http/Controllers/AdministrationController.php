<?php

namespace App\Http\Controllers;

use App\Category;
use App\Appreciation;
use Illuminate\Http\Request;
use App\Http\Controllers\AppreciationController;

class AdministrationController extends Controller
{
    public function index()
    {
        return view('administration')
                ->with('appreciations', Appreciation::all())
                ->with('categories', Category::all());
    }
}
