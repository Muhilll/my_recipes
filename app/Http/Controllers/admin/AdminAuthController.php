<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function index(){
        return view('admin.auth.index');
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

        if ($user->role === 'admin') {
            Auth::login($user);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Role tidak sesuai!');
    }
}
