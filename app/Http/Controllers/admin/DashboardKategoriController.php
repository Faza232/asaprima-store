<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategori.index', [
            'kategori' => Kategori::all(),
            'subkategori' => SubKategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);
        Kategori::create($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'New Kategori has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        // Menampilkan data spesifik tiap kategori (READ)
        return view('admin.kategori.show', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        // menampilkan view untuk update
        return view('admin.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // dd($request);
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);

        Kategori::where('id', $kategori->id)
            ->update($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Kategori has been updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/dashboard/kategori')->with('success', 'Kategori has been deleted');
    }    
}
