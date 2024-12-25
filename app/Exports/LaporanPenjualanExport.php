<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPenjualanExport implements FromView
{
    public $start_date;
    public $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        $transaksiHarian = Transaksi::with('detailTransaksi.produk')
            ->whereBetween('created_at', [$this->start_date, $this->end_date])
            ->get();

        return view('exports.laporan_penjualan', [
            'transaksiHarian' => $transaksiHarian
        ]);
    }
}
