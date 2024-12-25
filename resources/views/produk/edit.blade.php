@extends('layout.app')
@section('title', 'Edit Barang')
@section('content')
    <br><div class="page-heading mb-4">
        <h1 class="h3 text-gray-800">Edit Barang</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Poppins', sans-serif;">Form Edit Barang</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="font-family: 'Roboto', sans-serif;">Kode Produk <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="id" name="id" value="{{ $produk->id }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk" style="font-family: 'Roboto', sans-serif;">Nama Produk <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori" style="font-family: 'Roboto', sans-serif;">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori_id">
                                @foreach ($kategori as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $produk->kategori_id ? 'selected' : '' }}>
                                        {{ $cat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga" style="font-family: 'Roboto', sans-serif;">Harga <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="harga" name="harga" value="{{ $produk->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="stok" style="font-family: 'Roboto', sans-serif;">Stok <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="stok" name="stok" value="{{ $produk->stok }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Update
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
