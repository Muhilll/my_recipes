<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $jumAdmin = User::where('role', 'admin')->count();
        $jumUser = User::where('role', 'user')->count();
        $jumMember = User::where('status', 'member')->count();
        $jumResep = Resep::all()->count();

        $resepTerbaru = Resep::latest()->take(5)->get();
        $memberTerbaru = User::where('status', 'member')->latest()->take(5)->get();
        return view('admin.dashboard', [
            'jumAdmin' => $jumAdmin,
            'jumUser' => $jumUser,
            'jumMember' => $jumMember,
            'jumResep' => $jumResep,
            'resepTerbaru' => $resepTerbaru,
            'memberTerbaru' => $memberTerbaru,
            'type_menu' => ''
        ]);
    }
}
