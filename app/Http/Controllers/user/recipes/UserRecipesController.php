<?php

namespace App\Http\Controllers\user\recipes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRecipesController extends Controller
{
    public function index(){
        return view('user.recipes.index');
    }
}
