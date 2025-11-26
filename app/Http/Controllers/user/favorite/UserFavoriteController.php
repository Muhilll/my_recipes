<?php

namespace App\Http\Controllers\user\favorite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function index(){
        return view('user.favorite.index');
    }
}
