<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{

    public function index(){
        $user_id = Auth::id();
        $profile = User::find($user_id);
        return view('admin.profile.index',[
            'profile' => $profile,
            'type_menu' => ''
        ]);
    }

    public function update(Request $request){
        $user_id = Auth::id();
        $request->validate([
            'email' => "required|email|unique:users,email,$user_id",
        ]);

        $user = User::find($user_id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        
        if($request->password){
            $user->password =  bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
