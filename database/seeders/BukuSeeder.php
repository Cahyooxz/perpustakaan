<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul' => 'Ikan Laskar',
            'penulis' => 'Laskar L',
            'penerbit' => 'Airlangga',
            'tahun' => 2007,
            'deskripsi' => 'Ikan laskar adalah suatu film yang',
            'stok' => 10
        ]);
        Buku::create([
            'judul' => 'Ikan Laskar 2',
            'penulis' => 'Laskar L 2',
            'penerbit' => 'Airlangga 2',
            'tahun' => 2007,
            'deskripsi' => 'Ikan laskar adalah suatu film yang 2',
            'stok' => 10
        ]);
    }
}
