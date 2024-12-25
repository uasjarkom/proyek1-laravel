<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\LaporanPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Laporan Penjualan Harian
        $transaksiHarianQuery = Transaksi::with('detailTransaksi.produk')
            ->whereDate('created_at', today());
        $this->applyDateFilter($transaksiHarianQuery, $startDate, $endDate);

        $transaksiHarian = $transaksiHarianQuery->get();
        $totalPenjualanHarian = $transaksiHarian->sum('total');

        // Laporan Penjualan Bulanan
        $transaksiBulananQuery = Transaksi::with('detailTransaksi.produk')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);
        $this->applyDateFilter($transaksiBulananQuery, $startDate, $endDate);

        $transaksiBulanan = $transaksiBulananQuery->get();
        $totalPenjualanBulanan = $transaksiBulanan->sum('total');

        return view('laporan.index', compact('transaksiHarian', 'totalPenjualanHarian', 'transaksiBulanan', 'totalPenjualanBulanan'));
    }

    private function applyDateFilter($query, $startDate, $endDate)
    {
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
    }

    public function exportExcel(Request $request)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        return Excel::download(new LaporanPenjualanExport($start_date, $end_date), 'laporan_penjualan.xlsx');
    }
}

?>