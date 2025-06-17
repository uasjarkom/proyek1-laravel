@extends('layout.app')

@section('title', 'Edit Laporan Keuangan')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Edit Laporan Keuangan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('laporan.keuangan.update', $laporan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="{{ $laporan->tanggal }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $laporan->keterangan }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah (Rp)</label>
                    <input type="number" class="form-control" name="jumlah" value="{{ $laporan->jumlah }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select class="form-control" name="jenis" required>
                        <option value="pemasukan" {{ $laporan->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="pengeluaran" {{ $laporan->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('laporan.keuangan') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
