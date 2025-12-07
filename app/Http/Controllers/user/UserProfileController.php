<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request){
        $user_id = Auth::id();
        $request->validate([
            'email' => "nullable|email|unique:users,email,$user_id",
            'password' => 'nullable|min:5',
        ]);


        $user = User::find($user_id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->jkl = $request->jkl;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        
        if($request->password){
            $user->password =  bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile Update Succesfull!');
    }
}
