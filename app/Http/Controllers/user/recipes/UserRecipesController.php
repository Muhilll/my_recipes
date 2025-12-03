<?php

namespace App\Http\Controllers\user\recipes;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;

class UserRecipesController extends Controller
{
    public function index(){
        $dataResep = Resep::all();
        return view('user.recipes.index', compact('dataResep'));
    }

    public function detail($id){
        $resep_id = decrypt($id);
        $resep = Resep::find($resep_id);
        return view('user.recipes.detail', compact('resep'));
    }
}
