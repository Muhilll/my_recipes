<?php

namespace App\Http\Controllers\admin\pengguna\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPenggunaAdminController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.admin.index', ['type_menu' => 'pengguna']);
    }

    public function data(Request $r)
    {
        $search = $r->search ?? '';
        $perPage = 10;

        $query = User::where('role', 'admin')
            ->when($search, function ($q) use ($search) {
                $q->where('email', 'like', "%$search%");
            });

        $admins = $query->paginate($perPage);

        return response()->json([
            'data' => $admins->items(),
            'pagination' => (string) $admins->links('pagination::bootstrap-4')
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'role' => 'admin',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        return response()->json([
            'admin' => $admin
        ]);
    }

    public function update(Request $r, $id)
    {
        $admin = User::findOrFail($id);

        $r->validate([
            'email' => "required|email|unique:users,email,$id",
        ]);

        $data = [
            'email' => $r->email,
        ];

        if ($r->password) {
            $data['password'] = Hash::make($r->password);
        }

        $admin->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil diperbarui'
        ]);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dihapus'
        ]);
    }
}
