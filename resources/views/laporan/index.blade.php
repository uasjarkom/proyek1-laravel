@extends('layout.app')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Laporan Penjualan</h1>

    <!-- Form Filter dan Ekspor Excel -->
    <form method="GET" action="">
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="form-control" id="start_date"
                        value="{{ request('start_date') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir</label>
                    <input type="date" name="end_date" class="form-control" id="end_date"
                        value="{{ request('end_date') }}" required>
                </div>
            </div>
        </div>
        
        <!-- Tombol untuk filter laporan dan ekspor Excel -->
        <div class="d-flex">
            <button type="submit" formaction="{{ route('laporan.index') }}" class="btn btn-primary mr-2">Filter Laporan</button>
            <button type="submit" formaction="{{ route('laporan.export-excel') }}" class="btn btn-success">Ekspor ke Excel</button>
        </div>
    </form>

    <!-- Laporan Penjualan Harian -->
    <div class="card mb-4 mt-4">
        <div class="card-header bg-primary text-white">
            <h4>Laporan Penjualan Harian</h4>
        </div>
        <div class="card-body">
            <h3>Total Penjualan Hari Ini: Rp{{ number_format($totalPenjualanHarian, 0, ',', '.') }}</h3>

            <!-- Membuat tabel responsif -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.Struk</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksiHarian as $transaksi)
                            <tr>
                                <td>{{ $transaksi->invoice_number }}</td>
                                <td>
                                    @foreach ($transaksi->detailTransaksi as $detail)
                                        {{ $detail->produk ? $detail->produk->nama_produk : 'Produk tidak ditemukan' }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($transaksi->detailTransaksi as $detail)
                                        {{ $detail->quantity }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Laporan Penjualan Bulanan -->
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Laporan Penjualan Bulanan</h4>
        </div>
        <div class="card-body">
            <h3>Total Penjualan Bulan Ini: Rp{{ number_format($totalPenjualanBulanan, 0, ',', '.') }}</h3>

            <!-- Membuat tabel responsif -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.Struk</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksiBulanan as $transaksi)
                            <tr>
                                <td>{{ $transaksi->invoice_number }}</td>
                                <td>
                                    @foreach ($transaksi->detailTransaksi as $detail)
                                        {{ $detail->produk ? $detail->produk->nama_produk : 'Produk tidak ditemukan' }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($transaksi->detailTransaksi as $detail)
                                        {{ $detail->quantity }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
