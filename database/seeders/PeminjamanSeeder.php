<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::create([
            'user_id' => 1,
            'buku_id' => 1,
            'tanggal_peminjaman' => now(),
            'tanggal_pengembalian' => Carbon::now()->addWeeks(2),
            'status' => 1,
        ]);
        Peminjaman::create([
            'user_id' => 1,
            'buku_id' => 2,
            'tanggal_peminjaman' => now(),
            'tanggal_pengembalian' => Carbon::now()->addWeeks(2),
            'status' => 1,
        ]);
    }
}
