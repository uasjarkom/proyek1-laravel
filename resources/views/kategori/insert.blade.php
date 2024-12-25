@extends('layout.app')
@section('title', 'Tambah Kategori')
@section('content')
    <br><div class="page-heading mb-4">
        <h1 class="h3 text-gray-800" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Tambah Kategori</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Poppins', sans-serif;">Form Tambah Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.add.insert') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="font-family: 'Roboto', sans-serif;">Kode Barang</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="Masukkan kode barang">
                            @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori" style="font-family: 'Roboto', sans-serif;">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukkan nama kategori">
                            @error('nama_kategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ url('kategori') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
