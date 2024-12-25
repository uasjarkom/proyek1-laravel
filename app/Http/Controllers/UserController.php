<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = DataUser::all(); // Mengambil semua data dari tabel users
        return view('user.tables', ['datauser' => $data]); // Mengirim data ke view tables
    }

    // Tambah data user
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'usertype' => 'required',
            'status' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ], $message);

        $data = new DataUser();

        $data->name = $request->name;
        $data->usertype = $request->usertype;
        $data->status = $request->status;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save(); // mewakili insert

        $user = DataUser::all();

        return redirect()->route('tables.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'usertype' => 'required|string|max:255',
    //     'status' => 'required|string|max:255',
    //     'email' => 'required|email|unique:users,email',
    //     'password' => 'required|string|min:6',
    // ]);

    // // Menyimpan data user
    // DataUser::create([
    //     'name' => $request->name,
    //     'usertype' => $request->usertype,
    //     'status' => $request->status,
    //     'email' => $request->email,
    //     'password' => bcrypt($request->password),  // Pastikan password dienkripsi
    // ]);

    // return redirect()->route('tables.index')->with('success', 'User berhasil ditambahkan.');
    // }

    // Update data user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'usertype' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ubah ke 'users'
            'password' => 'nullable|string|min:6', // Password tetap validasi sebagai opsional
        ]);

        $user = DataUser::findOrFail($id);

        // Perbarui data
        $user->update([
            'name' => $request->name,
            'usertype' => $request->usertype,
            'status' => $request->status,
            'email' => $request->email,
            'password' => $request->password ??  $user->password, // Hanya update password jika diisi
        ]);

        return redirect()->route('tables.index')->with('success', 'User berhasil diperbarui.'); // Pastikan route ini ada
    }

    // Hapus data user
    public function destroy($id)
    {
        $user = DataUser::findOrFail($id);
        $user->delete();

        return redirect()->route('tables.index')->with('success', 'User berhasil dihapus.'); // Pastikan route ini ada
    }
}
