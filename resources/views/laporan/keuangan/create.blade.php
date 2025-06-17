@extends('layout.app')

@section('title', 'Tambah Laporan Keuangan')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Tambah Laporan Keuangan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('laporan.keuangan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
                <div class="form-group">
                    <label for="tipe">Jenis</label>
                    <select class="form-control" name="jenis" required>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah (Rp)</label>
                    <input type="number" class="form-control" name="jumlah" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
