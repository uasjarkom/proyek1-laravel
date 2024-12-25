<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi_detail extends Model
{
    use HasFactory;
    protected $table = 'transaksi_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id','transaksi_id', 'produk_id', 'quantity', 'subtotal'];
    
    use HasFactory;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id'); // Foreign key adalah transaksi_id
    }
}
