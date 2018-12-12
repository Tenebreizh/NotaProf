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

    public function store(Request $request)
    {
        $classe = new Classes();
        $classe->name = $request->name;
        $classe->save();

        flash('Votre classe à bien été ajouté !')->success();
        return redirect()->back();
    }
}
