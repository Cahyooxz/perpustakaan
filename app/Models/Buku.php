<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'deskripsi',
        'cover',
        'stok',
    ];
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
