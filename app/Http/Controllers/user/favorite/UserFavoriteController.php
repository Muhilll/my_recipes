<?php

namespace App\Http\Controllers\user\favorite;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoriteController extends Controller
{
    public function index(){
        $dataFavorit = Favorit::where('user_id', Auth::id())->get();
        return view('user.favorite.index', compact('dataFavorit'));
    }

    public function tambahFavorite(Request $request){
        $request->validate([
            'resep_id' => 'required'
        ]);
        
        $resep_id = decrypt($request->resep_id);

        Favorit::create([
            'user_id' => Auth::id(),
            'resep_id' => $resep_id
        ]);

        return redirect()->route('user.favorite');
    }

    public function hapusFavorite(Request $request){
        $request->validate([
            'resep_id' => 'required'
        ]);
        
        $resep_id = decrypt($request->resep_id);

        $favorit = Favorit::where('user_id', Auth::id())->where('resep_id', $resep_id)->first();
        $favorit->delete();

        return redirect()->route('user.favorite');
    }
}
