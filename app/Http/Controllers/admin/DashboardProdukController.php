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
        if(request('subkategori')){
            $subkategori = SubKategori::firstWhere('id', request('subkategori'));
            $title = ' in '.$subkategori->name;
            $active = $subkategori->id;
        }
        return view('admin.produk.index', [
            'produk'=>Produk::latest()->filter(request(['subkategori']))->paginate(7)->withQueryString(),
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $kategoriId = request('kategory_id');
        
        return view('admin.produk.create', [
            'kategori' => Kategori::all()
        ]);
    }

        public function getSubKategori($id)
    {
        $subkategori = SubKategori::where('kategori_id', $id)->get();
        return response()->json($subkategori);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required',
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

        return redirect('/dashboard/produk')->with('success', 'New Produk has been added');
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', [
            'produk' => $produk
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required',
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

        return redirect('/dashboard/produk')->with('success', 'New Produk has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Produk $produk)
    {
        // Hapus data
        if($produk->Image){
            $imagepath=public_path($produk->Image);
            unlink($imagepath);
        }

        Produk::destroy(@$produk->id);   // delete from post where id = slug
        return redirect('/dashboard/produk')->with('success', 'Post has been deleted');
    }
}