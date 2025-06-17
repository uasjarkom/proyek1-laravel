<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        // Ambil semua laporan keuangan
        $laporan = LaporanKeuangan::all();

        // Mengambil tanggal yang unik untuk label grafik
        $labels = $laporan->pluck('tanggal')->unique()->values();

        // Menyusun data pemasukan dan pengeluaran berdasarkan tanggal
        $pemasukan = [];
        $pengeluaran = [];

        foreach ($labels as $tanggal) {
            $pemasukan[] = $laporan->where('tanggal', $tanggal)->where('jenis', 'pemasukan')->sum('jumlah');
            $pengeluaran[] = $laporan->where('tanggal', $tanggal)->where('jenis', 'pengeluaran')->sum('jumlah');
        }

        // Kirim data laporan, labels, pemasukan, dan pengeluaran ke view
        return view('laporan.keuangan.index', compact('laporan', 'labels', 'pemasukan', 'pengeluaran'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        return view('laporan.keuangan.edit', compact('laporan'));
    }

    // Menyimpan hasil update
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric',
        ]);

        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->update($request->only('tanggal', 'keterangan', 'jenis', 'jumlah'));

        return redirect()->route('laporan.keuangan')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.keuangan')->with('success', 'Laporan berhasil dihapus.');
    }

    public function create()
    {
        return view('laporan.keuangan.create'); // Form tambah data
    }

    public function store(Request $request)
    {
        LaporanKeuangan::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan, // ← tambahkan ini
            'jenis' => $request->jenis, // tapi ini tidak disarankan
            'jumlah' => $request->jumlah,
        ]);
    
        return redirect()->route('laporan.keuangan')->with('success', 'Data berhasil ditambahkan!');
    }
}
