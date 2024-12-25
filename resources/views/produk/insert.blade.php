@extends('layout.app')
@section('title', 'Tambah Barang')
@section('content')
    <br><div class="page-heading mb-4">
        <h1 class="h3 text-gray-800">Tambah Barang</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.add.insert') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id">Kode Barang</label>
                            <input type="text" id="id" name="id" class="form-control" placeholder="Masukkan kode barang">
                            @error('id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
                            @error('nama_produk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori_id" id="kategori" class="form-control">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan harga produk">
                            @error('harga')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" id="stok" name="stok" class="form-control" placeholder="Masukkan jumlah stok">
                            @error('stok')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ url('produk') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
