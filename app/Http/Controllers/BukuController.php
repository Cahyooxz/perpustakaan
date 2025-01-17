<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $buku = Buku::select('id','judul')->where('judul','like','%'.'tes'.'%')->get();
        $buku = Buku::all();
        return view('buku.index',[
            'buku' => $buku
        ]);
    }
    public function user_index()
    {
        // $buku = Buku::select('id','judul')->where('judul','like','%'.'tes'.'%')->get();
        $buku = Buku::all();
        return view('buku.user_index',[
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_buku' => 'required|min:5',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi_buku' => 'required',
            'stok_buku' => 'required',
            'cover_buku' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->file('cover_buku')){
            $image = $request->file('cover_buku');
            $image->storeAs('public/buku', $image->hashName());
    
    
            $data = [
                'judul' => $request->judul_buku,
                'penulis' => $request->penulis_buku,
                'penerbit' => $request->penerbit_buku,
                'tahun' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi_buku,
                'stok' => $request->stok_buku,
                'cover' => $image->hashName(),
            ];
        }
        else{
            $data = [
                'judul' => $request->judul_buku,
                'penulis' => $request->penulis_buku,
                'penerbit' => $request->penerbit_buku,
                'tahun' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi_buku,
                'stok' => $request->stok_buku,
            ];
        }
        
        $data_simpan = Buku::create($data);

        if($data_simpan){
            return redirect()->route('buku.index')->with('success','Data berhasil disimpan');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $peminjaman = Peminjaman::where('buku_id',$id)->where('user_id',Auth::user()->id)->where('status',1)->get();
        $komentar = Ulasan::with(['user','buku'])->where('buku_id',$id)->orderBy('updated_at','desc')->get();
        return view('buku.show',[
            'buku' => $buku,
            'peminjaman' => $peminjaman,
            'komentar' => $komentar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit',[
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $this->validate($request,[
            'judul_buku' => 'required|min:5',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'tahun_terbit' => 'required',
            'deskripsi_buku' => 'required',
            'stok_buku' => 'required',
            'cover_buku' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($request->file('cover_buku')){
            if($buku->cover){
                Storage::delete('public/buku/'.$buku->cover);
            }
            $image = $request->file('cover_buku');
            $image->storeAs('public/buku',$image->hashName());

            $data = [
                'judul' => $request->judul_buku,
                'penulis' => $request->penulis_buku,
                'penerbit' => $request->penerbit_buku,
                'tahun' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi_buku,
                'stok' => $request->stok_buku,
                'cover' => $image->hashName(),
            ];
        } else{
            $data = [
                'judul' => $request->judul_buku,
                'penulis' => $request->penulis_buku,
                'penerbit' => $request->penerbit_buku,
                'tahun' => $request->tahun_terbit,
                'deskripsi' => $request->deskripsi_buku,
                'stok' => $request->stok_buku,
            ];
        }
        $buku->update($data);

        return redirect()->route('buku.index')->with('success','Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        
        return redirect()->route('buku.index')->with('success','Data berhasil dihapus');
    }

    public function pinjaman_user(){
        $buku =Buku::all();
        
        return view('buku.user_index');
    }
}
