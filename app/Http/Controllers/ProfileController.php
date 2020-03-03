<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Auth::user()->id);

        if ($user) {
            return view('profile')->withUser($user);
        } else {

            dd($user);
        }
    }

    public function updateUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $validator = Validator::make($request->all(), [
            'name' => ['max:255'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if ($request->name && $request->name != $user->name) {
            $user->name = $request->name;
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->phone_number &&  $request->phone_number != $user->phone_number) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->birthday &&  $request->birthday != $user->birthday) {
        $user->birthday = $request->birthday;
            $user->save();
        }
       // $user->save();
        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'max:255'],
            'phone_number' =>['string', 'min:10', 'max:10'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
        ]);
    }

}
