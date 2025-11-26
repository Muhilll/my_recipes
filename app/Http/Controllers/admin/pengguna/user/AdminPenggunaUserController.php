<?php

namespace App\Http\Controllers\admin\pengguna\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPenggunaUserController extends Controller
{
    public function index(){
        return view('admin.pengguna.user.index', ['type_menu' => 'pengguna']);
    }
}
