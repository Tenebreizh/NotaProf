<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

class ParameterController extends Controller
{
    /**
     * Return paramaters page of the current user
     *
     * @return void
     */
    public function index()
    {
        return view('user_parameters')->with('user', Auth::user());
    }

    /**
     * Update the user profile
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,bmp,png,gif',
            'name' => 'required|string|max:255',
            // 'password' => 'required'
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->avatar) {
            $user->avatar = $this->userAvatar($user->avatar, $request->avatar);
        }

        // $user->password = bcrypt($request->password);
        $user->save();

        flash('Votre compte à bien été mis à jour !')->success();
        return redirect()->back();
    }

    /**
     * Update the user password
     *
     * @param Request $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        // Get user
        $user = Auth::user();

        // Validation
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) 
        {
            flash("Une erreur s'est produite...")->error();
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Update password
        $user->password = bcrypt($request->password);
        $user->save();

        // Return with success message
        flash('Votre mot de passe à bien été mis à jour !')->success();
        return redirect()->back();
    }

    /**
     * Check if an avatar for this user already exist(Delete it if true) & upload the user avatar
     *
     * @param User $userAvatar
     * @param file $newAvatar
     * @return void
     */
    private function userAvatar($userAvatar, $newAvatar)
    {
        if ($userAvatar) 
        {
            Storage::delete('public/'.$userAvatar);
        }

        $path = str_replace('public/', 'storage/', Storage::putFile('public/avatars', new File($newAvatar)));
        
        return $path;
    }
}
