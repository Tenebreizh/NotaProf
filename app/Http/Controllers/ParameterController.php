<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class ParameterController extends Controller
{
    public function index()
    {
        return view('user_parameters')->with('user', Auth::user());
    }

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
