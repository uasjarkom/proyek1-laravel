@extends('layout.app')
@section('title', 'Kasir')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Kasir</h1>

    {{-- Notifikasi sukses dan error --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            };
        </script>
    @endif

    {{-- Form Tambah ke Keranjang --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Produk ke Keranjang</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('kasir.add') }}" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="produk_id" class="form-label">Pilih Produk</label>
                    <select name="produk_id" id="produk_id" class="form-control" required>
                        <option value="">Pilih Produk</option>
                        @foreach ($produk as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->nama_produk }} - Rp{{ number_format($product->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Keranjang --}}
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h4>Keranjang Belanja</h4>
        </div>
        <div class="card-body">
            @if (count($cart) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $item)
                            <tr>
                                <td>{{ $item['nama_produk'] }}</td>
                                <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('kasir.remove', $id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="text-end mt-3">Total: Rp{{ number_format($total, 0, ',', '.') }}</h4>
            @else
                <p class="text-center">Keranjang kosong. Silakan tambahkan produk.</p>
            @endif
        </div>
    </div>

    {{-- Checkout --}}
    @if (count($cart) > 0)
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Checkout</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('kasir.checkout') }}" class="row g-3">
                    @csrf
                    <div class="col-md-8">
                        <label for="payment" class="form-label">Pembayaran</label>
                        <input type="number" name="payment" id="payment" class="form-control" placeholder="Masukkan jumlah pembayaran" min="{{ $total }}" required>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Proses Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
