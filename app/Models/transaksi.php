<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'nama_peminjam',
        'tipe_mobil',
        'supir',
        'total_pembayaran',
        'status',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
