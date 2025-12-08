<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dataResepSatu = Resep::take(3)->with('ulasan')->withAvg('ulasan', 'rating')->withCount('ulasan')->get();
        $dataResepDua = Resep::take(2)->with('ulasan')->withAvg('ulasan', 'rating')->withCount('ulasan')->get();
        $dataResepTiga = Resep::take(6)->with('ulasan')->withAvg('ulasan', 'rating')->withCount('ulasan')->get();
        $dataResepEmpat = Resep::take(9)->with('ulasan')->withAvg('ulasan', 'rating')->withCount('ulasan')->get();
        return view('user.dashboard', compact('dataResepSatu', 'dataResepDua', 'dataResepTiga', 'dataResepEmpat'));
    }
}
