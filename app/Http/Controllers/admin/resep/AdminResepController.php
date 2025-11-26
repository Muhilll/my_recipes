<?php

namespace App\Http\Controllers\admin\resep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminResepController extends Controller
{
    public function index(){
        return view('admin.resep.index', ['type_menu' => 'resep']);
    }
}
