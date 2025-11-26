<?php

namespace App\Http\Controllers\admin\resep\kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index() {
        return view('admin.resep.kategori.index',['type_menu' => 'resep']);
    }
}
