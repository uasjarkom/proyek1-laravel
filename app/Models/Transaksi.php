<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['id','invoice_number', 'total', 'payment', 'change'];

    public function detailtransaksi()
    {
        return $this->hasMany(Transaksi_detail::class);
    }
    
}
