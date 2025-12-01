<?php

namespace App\Http\Controllers\admin\resep;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminResepController extends Controller
{
    public function index()
    {
        $dataKategori = Kategori::all();
        return view('admin.resep.index', [
            'dataKategori' => $dataKategori,
            'type_menu' => 'resep'
        ]);
    }

    public function data(Request $r)
    {
        $search = $r->search ?? '';
        $perPage = 10;

        $query = Resep::with('kategori')
            ->when($search, function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            });

        $reseps = $query->paginate($perPage);

        return response()->json([
            'data' => $reseps->items(),
            'pagination' => (string) $reseps->links('pagination::bootstrap-4')
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'des' => 'required',
            'estimasi_persiapan' => 'required|numeric',
            'estimasi_masak' => 'required|numeric',
            'perkiraan_hasil' => 'required|numeric',
            'bahan' => 'required|array|min:1',
            'langkah' => 'required|array|min:1',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPaths = [];
        if ($r->hasFile('gambar')) {
            foreach ($r->file('gambar') as $file) {
                $gambarPaths[] = $file->store('reseps', 'public');
            }
        }

        $resep = Resep::create([
            'nama' => $r->nama,
            'kategori_id' => $r->kategori_id,
            'des' => $r->des,
            'persiapan' => $r->estimasi_persiapan,
            'masak' => $r->estimasi_masak,
            'hasil' => $r->perkiraan_hasil,
            'bahan' => json_encode($r->bahan),
            'langkah' => json_encode($r->langkah),
            'gambar' => json_encode($gambarPaths),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->bahan = json_decode($resep->bahan, true);
        $resep->langkah = json_decode($resep->langkah, true);
        $resep->gambar = json_decode($resep->gambar, true);

        return response()->json(['resep' => $resep]);
    }

    public function update(Request $r, $id)
    {
        $resep = Resep::findOrFail($id);

        $r->validate([
            'nama' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'des' => 'required',
            'estimasi_persiapan' => 'required|numeric',
            'estimasi_masak' => 'required|numeric',
            'perkiraan_hasil' => 'required|numeric',
            'bahan' => 'required|array|min:1',
            'langkah' => 'required|array|min:1',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $oldImages = json_decode($resep->gambar, true) ?? [];
        $keepImages = $r->gambar_old ?? []; // gambar lama yang masih digunakan

        // ========== HAPUS GAMBAR YANG TIDAK DIPAKAI LAGI ==========
        foreach ($oldImages as $img) {
            if (!in_array($img, $keepImages)) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }

        // ========== TAMBAH GAMBAR BARU ==========
        if ($r->hasFile('gambar')) {
            foreach ($r->file('gambar') as $file) {
                $keepImages[] = $file->store('reseps', 'public');
            }
        }

        // Update data
        $resep->update([
            'nama' => $r->nama,
            'kategori_id' => $r->kategori_id,
            'des' => $r->des,
            'persiapan' => $r->estimasi_persiapan,
            'masak' => $r->estimasi_masak,
            'hasil' => $r->perkiraan_hasil,
            'bahan' => json_encode($r->bahan),
            'langkah' => json_encode($r->langkah),
            'gambar' => json_encode($keepImages),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil diperbarui'
        ]);
    }


    public function delete($id)
    {
        $resep = Resep::findOrFail($id);
        // Hapus gambar dari storage
        $gambars = json_decode($resep->gambar, true) ?? [];
        foreach ($gambars as $g) {
            if (Storage::disk('public')->exists($g)) {
                Storage::disk('public')->delete($g);
            }
        }
        $resep->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resep berhasil dihapus'
        ]);
    }
}
