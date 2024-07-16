<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku','user'])->get();
        return view('peminjaman.index',[
            'peminjaman' => $peminjaman
        ]);
    }
    
    public function user_index(Request $request)
    {
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->get();
        $buku = Buku::query();
        if($request->has('search')){
            $buku->where('judul','LIKE','%'.$request->search.'%');
        }

        $buku = $buku->get();

        return view('peminjaman.user_index',[
            'buku' => $buku,
            'wishlist' => $wishlist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $buku = $request->id_buku;

        $punyabuku = Peminjaman::where('buku_id',$request->id_buku)->where('user_id',$user)->first();

        if($punyabuku === null){
            $data = Peminjaman::create([
               'user_id' => $user,
               'buku_id' => $buku,
               'tanggal_peminjaman' => Carbon::now(),
               'tanggal_pengembalian' => Carbon::now()->addWeeks(2),
               'status' => 1,
            ]);
            return redirect()->route('peminjaman.show')->with('success','Buku berhasil dipinjam!');
        }elseif($punyabuku->where('status',0)){
            $punyabuku->update([
                'status' => 1
            ]);
            return redirect()->route('peminjaman.show')->with('success','Buku berhasil dipinjam!');
        }else{
            return redirect()->route('buku.show',['id' => $buku])->with('fail_pinjam','kamu udah pinjam buku ini :) ');
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $bukusaya = Peminjaman::with(['user','buku'])->where('user_id',Auth::user()->id)->where('status',1)->get();
        return view('peminjaman.user_show',[
            'buku' => $bukusaya
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->delete();

        return redirect()->route('peminjaman.index')->with('success','Data berhasil dihapus');
    }
}
