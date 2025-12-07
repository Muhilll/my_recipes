<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{

    public function index(){
        $profile = User::find(10);
        return view('admin.profile.index',[
            'profile' => $profile,
            'type_menu' => ''
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'email' => "required|email|unique:users,email,$request->user_id",
            'password' => 'nullable|min:5',
        ]);

        $user = User::find($request->user_id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        
        if($request->password){
            $user->password = $request->password;
        }
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
