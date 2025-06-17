<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'nama_produk', 'harga', 'stok'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function transaksiDetail()
    {
        return $this->hasMany(Transaksi_Detail::class, 'produk_id'); // Foreign key adalah produk_id
    }
}
