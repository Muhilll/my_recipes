<?php

namespace App\Http\Controllers\admin\pengguna\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPenggunaAdminController extends Controller
{
    public function index(){
        return view('admin.pengguna.admin.index',['type_menu' => 'pengguna']);
    }
}
