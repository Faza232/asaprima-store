<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;


class DashboardSubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subkategori.index', [
            'subkategori' => SubKategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kategori $kategori){
        return view ('admin.subkategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|max:255',
            'kategori_id' => 'required'
        ]);
        SubKategori::create($validatedData);

        return redirect('/dashboard/subkategori')->with('success', 'New SubKategori has been added!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKategori $subkategori)
    {
        // menampilkan view untuk update
        return view('admin.subkategori.edit', [
            'subkategori' => $subkategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKategori $subkategori)
    {
        // dd($request);
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required|max:255',
            'kategori_id' => 'required'
        ];
        $validatedData = $request->validate($rules);

        SubKategori::where('id', $subkategori->id)
            ->update($validatedData);

        return redirect('/dashboard/subkategori')->with('success', 'SubKategori has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKategori $subkategori)
    {
        SubKategori::destroy($subkategori->id);
        return redirect('/dashboard/subkategori')->with('success', 'SubKategori has been deleted');
    }    
}
