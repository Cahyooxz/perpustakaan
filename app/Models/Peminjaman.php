<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
      'user_id',
      'buku_id',
      'status',
    ];
    protected $casts = [
      'tanggal_peminjaman' => 'datetime',
      'tanggal_pengembalian' => 'datetime',
  ];
    public function buku(){
      return $this->belongsTo(Buku::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
}
