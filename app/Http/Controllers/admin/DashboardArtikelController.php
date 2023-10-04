<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.artikel.index', [
            'artikel'=>Artikel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Proses Menyimpan data
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|unique:artikel',
                'image' => 'image|file|max:3000',
                'body' => 'required'
            ]);
    
            if($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('Artikel-images');
            }
    
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
            Artikel::create($validatedData);
    
            return redirect('/dashboard/artikel')->with('success', 'New Artikel has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        // Menampilkan data spesifik tiap Artikel (READ)
        return view('dashboard.artikel.show', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel $artikel)
    {
        return view('dashboard.artikel.edit', [
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
            'image' => 'image|file|max:3000',
            'body' => 'required'
        ];

        if($request->slug != $artikel->slug){
            $rules['slug'] = 'required|unique:Artikel';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('Artikel-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Artikel::where('id', $artikel->id)
            ->update($validatedData);

        return redirect('/dashboard/Artikel')->with('success', 'Artikel has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        // Hapus data
        if(@$artikel->image){
            Storage::delete(@$artikel->image);
        }

        Artikel::destroy(@$artikel->id);   // delete from post where id = slug
        return redirect('/dashboard/artikel')->with('success', 'Post has been deleted');
    }
}
