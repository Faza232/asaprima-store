<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdukRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProdukRequest;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("frontend.product", [
            'kategories'=> Kategori::all(),
            'subkategories'=>SubKategori::all(),
            'produks'=>Produk::all(),
        ]);
    }

    public function getProdukBySubkategori(Request $request)
    {
        $subkategoriId = $request->query('subkategori_id');

        // Lakukan logika untuk mendapatkan produk berdasarkan subkategori
        $produks = Produk::where('subkategori_id', $subkategoriId)->get();

        return response()->json(['produks' => $produks]);
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
    public function store(StoreProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
