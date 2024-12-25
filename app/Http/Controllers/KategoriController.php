<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index', [
            'kategori' => Kategori::latest()->get()
        ]);
    }
    public function add()
    {
        return view('kategori.insert');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori')->with('message', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id){
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();
        return redirect()->route('kategori')->with('message', 'Data Berhasil Diperbarui!');
    }
    public function destroy($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('message', 'Data Berhasil Dihapus!');
    }
}
