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
      'tanggal_peminjaman',
      'tanggal_pengembalian',
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

    public static function booted(){
      static::created(function ($peminjaman){
        $buku = Buku::where('id',$peminjaman->buku_id)->first();

        if($buku->stok >= 1){
          $buku->update([
            'stok' => $buku->stok - 1
          ]);
        }
      });
    }
}
