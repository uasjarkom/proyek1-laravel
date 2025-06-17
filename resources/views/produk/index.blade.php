@extends('layout.app')
@section('title', 'Barang')
@section('content')

    <!-- Page Heading -->
    <br><div class="page-heading mb-4">
        <h1 class="h3 text-gray-800">Barang</h1>
    </div>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
            <a href="{{ route('produk.insert') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($produk as $row)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->nama_produk }}</td>
                                <td>{{ $row->kategori->nama_kategori }}</td>
                                <td>Rp{{ number_format($row->harga, 0, ',', '.') }}</td>
                                <td class="{{ $row->stok < 5 ? 'bg-danger text-white font-weight-bold' : '' }}">
                                    {{ $row->stok }}
                                </td>                                                           
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('produk.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a>
                                        <form action="{{ route('produk.delete', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
