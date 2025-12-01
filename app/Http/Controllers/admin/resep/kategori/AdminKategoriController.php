<?php

namespace App\Http\Controllers\admin\resep\kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index() {
        return view('admin.resep.kategori.index', ['type_menu' => 'resep']);
    }

    public function data(Request $r)
    {
        $search = $r->search ?? '';
        $perPage = 10;

        $query = Kategori::when($search, function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('slug', 'like', "%$search%");
        });

        $kategori = $query->paginate($perPage);

        return response()->json([
            'data' => $kategori->items(),
            'pagination' => (string) $kategori->links('pagination::bootstrap-4')
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required|unique:kategoris',
            'slug' => 'required|unique:kategoris',
        ]);

        Kategori::create([
            'nama' => $r->nama,
            'slug' => $r->slug,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        return response()->json(['kategori' => $kategori]);
    }

    public function update(Request $r, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $r->validate([
            'nama' => "required|unique:kategoris,nama,$id",
            'slug' => "required|unique:kategoris,slug,$id",
        ]);

        $kategori->update([
            'nama' => $r->nama,
            'slug' => $r->slug,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui'
        ]);
    }

    public function delete($id)
    {
        Kategori::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}