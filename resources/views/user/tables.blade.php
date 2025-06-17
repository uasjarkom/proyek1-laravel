@extends('layout.app')
@section('title', 'Manajemen Pengguna')
@section('content')
<br>
{{-- Pesan Sukses --}}
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Card Data User --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
        <button class="btn btn-success" id="btnTambahUser" data-toggle="tooltip" data-placement="top" title="Tambah Pengguna"><i class="fas fa-plus-circle"></i> Tambah Pengguna</button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tipe Pengguna</th>
                        <th>E-mail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datauser as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->usertype }}</td>
                            <td>{{ $data->email }}</td>
                            <td class="text-center">
                                {{-- Tombol Update --}}
                                <button class="btn btn-warning btn-sm btnEdit" 
                                        data-url="{{ route('tables.update', $data->id) }}"
                                        data-name="{{ $data->name }}"
                                        data-usertype="{{ $data->usertype }}"
                                        data-email="{{ $data->email }}"
                                        data-toggle="tooltip" 
                                        title="Perbarui Pengguna">
                                    <i class="fas fa-edit"></i>
                                </button>
                        
                                {{-- Form Hapus --}}
                                <form action="{{ route('tables.destroy', $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                            data-toggle="tooltip" title="Hapus Pengguna">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tables.store') }}" method="POST" id="myForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" required>
                    </div>
                    <div class="form-group">
                        <label for="usertype">Tipe User</label>
                        <select class="form-control" id="usertype" name="usertype" required>
                            <option value="" disabled selected>Pilih tipe pengguna</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>                                      
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Update --}}
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formUpdate" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateLabel">Perbarui Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_name">Nama</label>
                        <input type="text" class="form-control" id="update_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="update_usertype">Tipe Pengguna</label>
                        <select class="form-control" id="update_usertype" name="usertype" required>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>                        
                    <div class="form-group">
                        <label for="update_email">Email</label>
                        <input type="email" class="form-control" id="update_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="update_password">Password (Opsional)</label>
                        <input type="password" class="form-control" id="update_password" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        // Tombol Tambah User
        $('#btnTambahUser').on('click', function () {
            $('#modalTambah').modal('show');
        });

        // Tombol Edit 
        $(document).on('click', '.btnEdit', function () {
            const name = $(this).data('name');
            const usertype = $(this).data('usertype');
            const email = $(this).data('email');
            const action = $(this).data('url');

            $('#update_name').val(name);
            $('#update_usertype').val(usertype);
            $('#update_email').val(email);

            // Set aksi form update dengan URL dari data-url
            $('#formUpdate').attr('action', action);

            $('#modalUpdate').modal('show');
        });

        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
