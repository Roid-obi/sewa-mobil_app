<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sopir extends Model
{
    use HasFactory;

    protected $table = 'sopirs';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'status',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
