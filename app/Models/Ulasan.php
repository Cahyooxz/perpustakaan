<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';


    protected $guarded = [
        'id'
    ];
    // protected $fillable = [
    //     'user_id',
    //     'buku_id',
    //     'komentar',
    //     'suka',
    // ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
