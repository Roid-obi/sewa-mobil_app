<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;

    protected $table = 'sopirs';

    protected $fillable = [
        'tipe_mobil',
        'plat_nomor',
        'bensin',
        'jumlah',
        'status',
        'jumlah_mobil',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
