@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <br><div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Sistem Pencatatan Penjualan</h1>
    </div>

    <!-- Section for Team Members -->
    <div class="row mt-4">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-3">
                <div class="card-body">
                    <h4 class="font-weight-bold text-primary mb-3">Anggota Kelompok</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary mr-3">1</span>
                            <i class="fas fa-user text-gray-600 mr-2"></i>
                            Azza Syarifah Lubnah <span class="text-muted">(2331730037)</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary mr-3">2</span>
                            <i class="fas fa-user text-gray-600 mr-2"></i>
                            Berliana Fatima Zahwa <span class="text-muted">(2331730119)</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary mr-3">3</span>
                            <i class="fas fa-user text-gray-600 mr-2"></i>
                            Dimas Seto Nugroho <span class="text-muted">(2331730023)</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary mr-3">4</span>
                            <i class="fas fa-user text-gray-600 mr-2"></i>
                            Sendy Maulana <span class="text-muted">(2331730027)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
