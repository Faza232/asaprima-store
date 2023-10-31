<?php

namespace App\Http\Controllers\admin;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DashboardArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.artikel.index', [
            'artikel'=>Artikel::selectRaw('*, DATE_FORMAT(CONVERT_TZ(created_at, "+00:00", "+07:00"), "%d %M %Y") as formatted_created_date')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Proses Menyimpan data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:artikels',
            'body' => 'required',
            'image' => 'nullable|image|file|max:3000',
            'status'=>'required'
        ]);
        // Buat nama foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $namaFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $namaFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 75);

        Artikel::create($validatedData);

        return redirect('/dashboard/artikel')->with('success', 'New Artikel has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        // Menampilkan data spesifik tiap Artikel (READ)
        return view('admin.artikel.show', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel $artikel)
    {
        return view('admin.artikel.edit', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        
        //proses update
        $rules = [
            'title' => 'required|max:255',
            'slug'=> 'required',
            'image' => 'image|file|max:3000',
            'body' => 'required'
        ];

        if($request->slug != $artikel->slug){
            $rules['slug'] = 'required|unique:Artikel';
        }

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

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Artikel::where('id', $artikel->id)
            ->update($validatedData);

        return redirect('/dashboard/artikel')->with('success', 'Artikel has been updated!');
    }

    public function approve(Artikel $artikel)
    {
        $artikel->update(['status' => true]);
        return redirect('/dashboard/artikel')->with('success', 'artikel has been approved');
    }
    
    public function notapprove(Artikel $artikel)
    {
        $artikel->update(['status' => false]);
        return redirect('/dashboard/artikel')->with('success', 'artikel has not been approved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        // Hapus data
        if($artikel->Image){
            $imagepath=public_path($artikel->Image);
            unlink($imagepath);
        }

        Artikel::destroy(@$artikel->id);   // delete from post where id = slug
        return redirect('/dashboard/artikel')->with('success', 'Post has been deleted');
    }
}
