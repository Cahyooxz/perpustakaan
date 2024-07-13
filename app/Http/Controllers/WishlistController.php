<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $wishlist = Wishlist::with(['user','buku'])->where('user_id',$user)->get();
        return view('wishlist.index',[
            'wishlist' => $wishlist,
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
        $buku = $request->buku_id;

        $data = Wishlist::create([
            'buku_id' => $buku,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('wishlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $buku_id)
    {
        $wishlist = Wishlist::where('buku_id',$buku_id)->where('user_id',Auth::user()->id);
        $wishlist->delete();

        return back();
    }
}
