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
        $title = '';
        $active = '';

        if(request('subkategori')){
            $subkategori = SubKategori::firstWhere('id', request('subkategori'));
            $title = ' in '.$subkategori->name;
            $active = $subkategori->id;
        }
        return view("frontend.product", [
            'active'=> $active,
            'kategories'=> Kategori::all(),
            'subkategories'=>SubKategori::all(),
            'produks'=>Produk::latest()->filter(request(['subkategori']))->paginate(7)->withQueryString()
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
