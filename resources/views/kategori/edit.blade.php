@extends('layout.app')
@section('title', 'Edit Kategori')
@section('content')
    <br><div class="page-heading mb-4">
        <h1 class="h3 text-gray-800" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Edit Kategori</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-family: 'Poppins', sans-serif;">Form Edit Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="font-family: 'Roboto', sans-serif;">Kode Kategori <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="id" name="id" value="{{ $kategori->id }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori" style="font-family: 'Roboto', sans-serif;">Nama Kategori <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-save"></i> Update
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
