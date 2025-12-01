<?php

namespace App\Http\Controllers\admin\pengguna\member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminPenggunaMemberController extends Controller
{
    public function index()
    {
        // Ambil user yang masih guest (calon member)
        $dataUser = User::where('status', 'guest')->get();

        return view('admin.pengguna.member.index', [
            'dataUser' => $dataUser,
            'type_menu' => 'pengguna'
        ]);
    }

    // Get DATA Member untuk AJAX
    public function data(Request $request)
    {
        $search = $request->search;

        $query = User::where('status', 'member')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($x) use ($search) {
                    $x->where('nama', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            })
            ->orderBy('id', 'DESC');

        $data = $query->paginate(10);

        return response()->json([
            'data' => $data->items(),
            'pagination' => $data->links('pagination::bootstrap-4')->render()
        ]);
    }

    // Tambahkan member
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->status = 'member';
        $user->tgl_daftar = Carbon::now();
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Member berhasil ditambahkan'
        ]);
    }

    // Hapus member → status kembali guest
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'guest';
        $user->tgl_daftar = null;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Member berhasil dihapus'
        ]);
    }
}
