<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\LaporanPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
    
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Harian
        $transaksiHarianQuery = Transaksi::with('detailTransaksi.produk');
        if ($startDate && $endDate) {
            $this->applyDateFilter($transaksiHarianQuery, $startDate, $endDate);
        } else {
            $transaksiHarianQuery->whereDate('created_at', today());
        }
        $transaksiHarian = $transaksiHarianQuery->get();
        $totalPenjualanHarian = $transaksiHarian->sum('total');
    
        // Bulanan
        $transaksiBulananQuery = Transaksi::with('detailTransaksi.produk');
        if ($startDate && $endDate) {
            $this->applyDateFilter($transaksiBulananQuery, $startDate, $endDate);
            $start = Carbon::parse($startDate)->startOfDay();
            $end = Carbon::parse($endDate)->endOfDay();
        } else {
            $start = now()->copy()->startOfMonth();
            $end = now()->copy()->endOfMonth();
            $transaksiBulananQuery->whereBetween('created_at', [$start, $end]);
        }
    
        $transaksiBulanan = $transaksiBulananQuery->get();
        $totalPenjualanBulanan = $transaksiBulanan->sum('total');
    
        // Siapkan data untuk chart bulanan
        $jumlahHari = $end->day;
        $penjualanHarian = [];
        $periode = Carbon::parse($start)->copy();
        
        while ($periode <= $end) {
            $penjualanHarian[$periode->format('Y-m-d')] = 0;
            $periode->addDay();
        }
        
        foreach ($transaksiBulanan as $transaksi) {
            $key = $transaksi->created_at->format('Y-m-d');
            if (isset($penjualanHarian[$key])) {
                $penjualanHarian[$key] += $transaksi->total;
            }
        }
        
    
        return view('laporan.index', compact(
            'transaksiHarian',
            'totalPenjualanHarian',
            'transaksiBulanan',
            'totalPenjualanBulanan',
            'penjualanHarian'
        ));
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