<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian_real',
        'denda'
    ];

    protected $casts = [
        'tanggal_pengembalian_real' => 'datetime',
    ];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }

}
