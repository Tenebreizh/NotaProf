<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Other\GeneratePassword;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->generate_password = new GeneratePassword(8);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.index')->with('admins', User::all()->where('admin', 1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'admin' => 1,
        ]);

        flash("L'administrateur a été créé avec succès")->success();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->name = $request->name;
        $admin->save();

        flash("L'administrateur a été modifié avec succès !")->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        flash("L'administrateur a été supprimé avec succès !")->success();
        return redirect()->back();
    }
}
