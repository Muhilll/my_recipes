<?php

namespace App\Http\Controllers\admin\pengguna\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPenggunaUserController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.user.index', ['type_menu' => 'pengguna']);
    }

    public function data(Request $r)
    {
        $search = $r->search ?? '';
        $perPage = 10;

        $query = User::where('role', 'user')
            ->when($search, function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });

        $users = $query->paginate($perPage);

        return response()->json([
            'data' => $users->items(),
            'pagination' => (string) $users->links('pagination::bootstrap-4')
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'jkl' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        User::create([
            'nama' => $r->nama,
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'jkl' => $r->jkl,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
            'role' => 'user',
            'status' => 'guest',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }

    public function update(Request $r, $id)
    {
        $user = User::findOrFail($id);

        $r->validate([
            'nama' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'jkl' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $data = [
            'nama' => $r->nama,
            'email' => $r->email,
            'jkl' => $r->jkl,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
        ];

        if ($r->password) {
            $data['password'] = Hash::make($r->password);
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil diperbarui'
        ]);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus'
        ]);
    }
}
