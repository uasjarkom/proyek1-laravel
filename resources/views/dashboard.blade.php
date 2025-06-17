@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <br><div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Sistem Pencatatan Penjualan</h1>
    </div>

    <!-- Section for Website Description -->
    <div class="row mt-4">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-3">
                <div class="card-body">
                    <h4 class="font-weight-bold text-primary mb-3">Tentang Sistem</h4>
                    <p class="text-justify">
                        Sistem Pencatatan Penjualan ini dirancang untuk membantu pelaku usaha dalam mencatat dan mengelola data penjualan secara efektif dan efisien. 
                        Dengan antarmuka yang sederhana dan fitur-fitur yang informatif, pengguna dapat melakukan pencatatan transaksi, melihat laporan penjualan, dan mengelola data produk dengan lebih mudah.
                    </p>
                    <p class="text-justify">
                        Sistem ini dibangun menggunakan teknologi berbasis web agar dapat diakses kapan saja dan di mana saja. Tujuannya adalah untuk mendukung digitalisasi proses bisnis serta memberikan kemudahan dalam pengambilan keputusan berdasarkan data penjualan yang tercatat secara real-time.
                    </p>
                    <p class="text-justify">
                        Diharapkan dengan adanya sistem ini, efisiensi kerja dapat meningkat dan kesalahan pencatatan manual dapat diminimalisir.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
