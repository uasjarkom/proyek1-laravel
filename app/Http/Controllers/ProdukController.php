<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index', [
            'produk' => Produk::latest()->get(),
        ]);
    }
    public function add()
    {
        $kategori = Kategori::latest()->get(); // Ambil data kategori
            return view('produk.insert', compact('kategori')); // Kirim ke view
    }
    public function insert(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

            $produk = new Produk();
            $produk->id = $request->id;
            $produk->nama_produk = $request->nama_produk;
            $produk->kategori_id = $request->kategori_id;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->save();
            
        return redirect()->route('produk')->with('message', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id){
        $produk = Produk::find($id); 
        $kategori = Kategori::latest()->get();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id){
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->update();
        return redirect()->route('produk')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function destroy($id){
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk')->with('message', 'Data Berhasil Dihapus');
    }

}
