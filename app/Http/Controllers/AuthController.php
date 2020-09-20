<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|alpha_dash',
            'password' => 'required',
        ]);

        $remember = $request->has('remember') ? true : false;
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password],$remember)) {
            return redirect()->back()->with('pesan','username atau password salah');
        }

        return redirect()->route('home');
    }

    public function editPassword()
    {
        return view('auth.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:3|confirmed',
        ]);


        if (Hash::check($validateData['password_lama'],Auth::user()->password)) {
            User::where('id',Auth::user()->id)->first()->update([
                'password' => bcrypt($validateData['password_baru']),
            ]);

            return redirect()->back()->with('pesan-sukses',"Kata sandi sukses diupdate");
        }else {
            return redirect()->back()->with('pesan-error','Kata sandi lama tidak cocok');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
