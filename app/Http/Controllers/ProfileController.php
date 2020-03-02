<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id)->first();

        if ($user) {
            return view('profile')->withUser($user);
        } else {

            dd($user);
        }
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);

        if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->phone_number) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back();

    }

}
