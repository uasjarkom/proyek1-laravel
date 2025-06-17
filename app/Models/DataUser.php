<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    // Mengatur nama tabel
    protected $table = 'users';

    // Mengatur primary key
    protected $primaryKey = 'id';

    // Kolom-kolom yang dapat diisi
    protected $fillable = ['name', 'usertype', 'email', 'password'];

    // Menonaktifkan timestamp jika tidak digunakan (hapus baris ini jika menggunakan timestamps) gae false true mekan
    public $timestamps = true;
}
