<?php

namespace App\Http\Controllers\user\recipes;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserUlasanController extends Controller
{
    public function tambahKomentar(Request $request){
        $request->validate([
            'resep_id' => 'required',
            'ulasan' =>'required',
            'rating'=> 'required',
        ]);

        $isKomentar = Ulasan::where('user_id', Auth::id())->where('resep_id', $request->resep_id)->exists();

        if($isKomentar){
            $ulasan = Ulasan::where('user_id', Auth::id())->where('resep_id', $request->resep_id)->first();
            $ulasan->ulasan = $request->ulasan;
            $ulasan->rating = $request->rating;
            $ulasan->save();
        }else{
            Ulasan::create([
                'ulasan' => $request->ulasan,
                'rating'=> $request->rating,
                'user_id'=> Auth::id(),
                'resep_id' => $request->resep_id,
            ]);
        }

        return redirect()->route('user.recipes.detail', encrypt($request->resep_id));
    }
}
