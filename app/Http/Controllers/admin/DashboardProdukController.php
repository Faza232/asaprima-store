<?php

namespace App\Http\Controllers\admin;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk.index', [
            'produk' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('admin.produk.create', [
            'subkategori' => SubKategori::all(),
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
            'kategori_id' => 'required',
            'subkategori_id' => 'required',
            'deskripsi' => 'required'
        ]);

        // Buat nama foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $namaFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $namaFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 75);
    

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
        return view('admin.produks.show', [
            'produk' => $produk
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Produk $produk)
    {
        return view('admin.produks.edit', [
            'produk' => $produk,
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
            'slug' => 'required|unique:produks',
            'image' => 'image|file|max:5048',
            'kategori_id' => 'required',
            'subkategori_id' => 'required',
            'deskripsi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                $imagepath=public_path($request->oldImage);
                if(file_exists($imagepath)) {
                    unlink($imagepath);
            }
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = Str::random(10) . time() . '.' . $extFile;

            $path = $request->image->move('image/galeri', $namaFile);
            $path = str_replace('\\', '/', $path);

            $validatedData['image'] = $path;
            }
        }

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
        if($produk->file('image')) {
            if($produk->Image){
                $imagepath=public_path($produk->Image);
                File::delete($imagepath);
            }
        }
        Produk::destroy($produk->id);
        return redirect('/dashboard/produks')->with('success', 'Produk has been deleted');
    }
}