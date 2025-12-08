<?php

namespace App\Http\Controllers\user\recipes;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use App\Models\Kategori;
use App\Models\Resep;
use App\Models\Ulasan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRecipesController extends Controller
{
    public function index(Request $request)
    {
        $dataKategori = Kategori::all();
        $query = Resep::query();

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $dataResep = $query->get();

        return view('user.recipes.index', compact('dataKategori', 'dataResep'));
    }


    public function detail($id)
    {
        $resep_id = decrypt($id);
        $resep = Resep::find($resep_id);

        $isFavorit = Favorit::where('user_id', Auth::id())->where('resep_id', $resep_id)->exists();
        $dataUlasan = Ulasan::all();

        return view('user.recipes.detail', compact('resep', 'isFavorit', 'dataUlasan'));
    }

    public function toPdf(Request $request)
    {
        $resep_id = decrypt($request->resep_id);
        $resep = Resep::findOrFail($resep_id);

        // load view untuk PDF
        $pdf = Pdf::loadView('user.recipes.pdf', compact('resep'));

        // download file PDF
        return $pdf->download($resep->nama . '.pdf');
    }
}
