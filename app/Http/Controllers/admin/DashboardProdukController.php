<?php

namespace App\Http\Controllers\admin;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class ProdukController extends Controller
{
    public function index()
    {
        return view('dashboard.produk.index', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('dashboard.produk.create', [
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:produks',
            'image' => 'image|file|max:5048',
            'category_id' => 'required',
            'body' => 'required'
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Produk::create($validatedData);

        return redirect('/dashboard/produks')->with('success', 'New Produk has been added');
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produks.show', [
            'post' => $produk
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produks.edit', [
            'post' => $produk,
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'

        ];



        if ($request->slug != $produk->slug) {
            $rules['slug'] = 'required|unique:produks';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Produk::where('id', $produk->id)
            ->update($validatedData);

        return redirect('/dashboard/produks')->with('success', 'New Produk has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image);
        }
        Produk::destroy($produk->id);
        return redirect('/dashboard/produks')->with('success', 'Produk has been deleted');
    }
}