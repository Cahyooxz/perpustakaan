<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($buku_id)
    {
        $peminjaman = Peminjaman::with(['user','buku'])->find($buku_id);
        $denda = 5000;

        $tenggat_tanggal = $peminjaman->tanggal_pengembalian;
        $tanggal_hari_ini = Carbon::now();

        $selisih_hari = $tenggat_tanggal->diffInDays($tanggal_hari_ini,false);

        if($selisih_hari > 0){
            $hari_keterlambatan = $selisih_hari;  
        } else{
            $hari_keterlambatan = 0;  
        }

        return view('pengembalian.index',[
            'peminjaman' => $peminjaman,
            'denda' => $denda,
            'hari_keterlambatan' => $hari_keterlambatan,
            'tanggal_hari_ini' => $tanggal_hari_ini,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($peminjaman_id,$denda)
    {

        $tanggal_pengembalian = Carbon::now();

        $peminjaman = Peminjaman::with(['user','buku'])->find($peminjaman_id);
        $buku = Buku::where('id',$peminjaman->buku_id)->first();

        $peminjaman->update([
            'denda' => $denda
        ]);

        $data = [
            'peminjaman_id' => $peminjaman->id,
            'tanggal_pengembalian_real' => $tanggal_pengembalian,
            'denda' => $denda,
        ];

        $pengembalian = Pengembalian::create($data);
        if($pengembalian){
            $peminjaman->update([
                'status' => 0
            ]);
            $buku->update([
                'stok' => $buku->stok + 1
            ]);

            return redirect('pinjaman_bukuku')->with('success','Pengembalian buku berhasil nih');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
