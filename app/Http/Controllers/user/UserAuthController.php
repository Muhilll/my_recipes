<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login(){
        return view('user.auth.login');
    }

    public function prosesLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan!');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password tidak sesuai!');
        }

        if ($user->role === 'user') {
            Auth::login($user);

            return redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Role tidak sesuai!');
    }

    public function register(){
        return view('user.auth.register');
    }

    public function prosesRegister(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'jkl' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jkl' => $request->jkl,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }
}