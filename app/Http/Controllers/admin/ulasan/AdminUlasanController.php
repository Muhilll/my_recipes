<?php

namespace App\Http\Controllers\admin\ulasan;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class AdminUlasanController extends Controller
{
    public function index()
    {
        return view('admin.ulasan.index', [
            'type_menu' => 'ulasan'
        ]);
    }

    public function data(Request $r)
    {
        $search = $r->search ?? '';
        $perPage = 10;

        $query = Ulasan::with(['user', 'resep'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($u) use ($search) {
                    $u->where('nama', 'like', "%$search%");
                })
                ->orWhereHas('resep', function ($r) use ($search) {
                    $r->where('nama', 'like', "%$search%");
                })
                ->orWhere('ulasan', 'like', "%$search%");
            });

        $ulasan = $query->paginate($perPage);

        return response()->json([
            'data' => $ulasan->items(),
            'pagination' => (string) $ulasan->links('pagination::bootstrap-4')
        ]);
    }
}
