<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Transaksi_detail;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Ambil semua produk dari database
        $cart = session()->get('cart', []); // Ambil data keranjang dari sesi
        $total = array_sum(array_column($cart, 'subtotal')); // Hitung total harga keranjang
        return view('kasir.index', compact('produk', 'cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        // Validasi input untuk memastikan produk ada dan jumlahnya valid
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data produk berdasarkan ID
        $produk = Produk::find($request->produk_id);

        // Jika produk tidak ditemukan atau stoknya habis, kembalikan error
        if (!$produk || $produk->stok <= 0) {
            return redirect()->back()->with('error', 'Produk tidak tersedia atau stok habis!');
        }

        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);

        // Hitung jumlah total yang akan ditambahkan ke keranjang
        $quantityInCart = isset($cart[$produk->id]) ? $cart[$produk->id]['quantity'] : 0;
        $totalQuantity = $quantityInCart + $request->quantity;

        // Periksa apakah stok mencukupi
        if ($totalQuantity > $produk->stok) {
            return redirect()->back()->with('error', 'Jumlah yang diminta melebihi stok yang tersedia!');
        }

        // Jika produk belum ada dalam keranjang, tambahkan sebagai entri baru
        if (!isset($cart[$produk->id])) {
            $cart[$produk->id] = [
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'quantity' => $request->quantity,
                'subtotal' => $request->quantity * $produk->harga,
            ];
        } else {
            // Jika produk sudah ada, tambah jumlah dan perbarui subtotal
            $cart[$produk->id]['quantity'] += $request->quantity;
            $cart[$produk->id]['subtotal'] = $cart[$produk->id]['quantity'] * $produk->harga;
        }

        // Simpan kembali data keranjang ke sesi
        session()->put('cart', $cart);

        return redirect()->route('kasir.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }


    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []); // Ambil data keranjang dari sesi

        // Hapus produk dari keranjang jika ada
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // Simpan kembali keranjang ke sesi
        }

        return redirect()->route('kasir.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []); // Ambil data keranjang dari sesi
        $total = array_sum(array_column($cart, 'subtotal')); // Hitung total harga keranjang
        $payment = $request->payment; // Jumlah pembayaran dari input

        // Validasi pembayaran
        if ($payment < $total) {
            return redirect()->route('kasir.index')->with('error', 'Pembayaran tidak cukup!');
        }

        // Simpan transaksi ke database
        $transaksi = Transaksi::create([
            'invoice_number' => 'INV-' . time(),
            'total' => $total,
            'payment' => $payment,
            'change' => $payment - $total,
        ]);

        // Simpan detail transaksi
        foreach ($cart as $produk_id => $item) {
            Transaksi_detail::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk_id,
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal'],
            ]);

            // Kurangi stok produk
            $produk = Produk::find($produk_id);
            $produk->stok -= $item['quantity'];
            $produk->save();
        }

        // Hapus data keranjang dari sesi
        session()->forget('cart');

        return view('kasir.receipt', compact('transaksi', 'cart'))->with('success', 'Transaksi berhasil!');
    }
}
