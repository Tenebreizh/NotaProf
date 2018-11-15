<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Other\GeneratePassword;
use App\Notifications\NewAccount;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display all the admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $admins = User::all()->where('admin', 1);

        return view('admins.index')->with('admins', $admins);
    }

    /**
     * Store a newly created admin.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $password = GeneratePassword::password(8);

        $admin = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($password),
            'admin'    => 1,
        ]);

        // Send notification to the fresh new user
        $admin->notify(new NewAccount($admin->email, $password));

        flash("L'administrateur a été créé avec succès")->success();

        return redirect()->back();
    }

    /**
     * Update the specified admin.
     *
     * @param Request $request
     * @param User    $admin
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $admin)
    {
        $admin->name = $request->name;
        $admin->save();

        flash("L'administrateur a été modifié avec succès !")->success();

        return redirect()->back();
    }

    /**
     * Remove the specified admin.
     *
     * @param User $admin
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        flash("L'administrateur a été supprimé avec succès !")->success();

        return redirect()->back();
    }
}
