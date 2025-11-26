<?php

namespace App\Http\Controllers\admin\ulasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUlasanController extends Controller
{
    public function index(){
        return view('admin.ulasan.index', ['type_menu' => '']);
    }
}
