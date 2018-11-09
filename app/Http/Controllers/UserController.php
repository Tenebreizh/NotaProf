<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\NewAccount;
use App\Http\Controllers\Other\GeneratePassword;

class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get non-admin users
        return view('users.index')->with('users', User::all()->where('admin', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $password = GeneratePassword::password(8);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);

        // Send notification to the fresh new user
        $user->notify(new NewAccount($user->email, $password));

        flash("L'utilisateur a été créé avec succès !")->success();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->save();

        flash("L'utilisateur a été modifié avec succès !")->success();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash("L'utilisateur a été supprimé avec succès !")->success();
        return redirect()->back();
    }
}
