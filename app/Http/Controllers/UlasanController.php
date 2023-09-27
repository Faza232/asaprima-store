<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
use App\Http\Requests\UpdateUlasanRequest;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.ulasan');
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
    public function store(StoreUlasanRequest $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
            'ulasan' => 'required',
        ]);
    
        // Simpan ulasan ke database
        $ulasan = new ulasan;
        $ulasan->nama = $request->input('nama');
        $ulasan->email = $request->input('email');
        $ulasan->ulasan = $request->input('ulasan');
        $ulasan->save();
    
        // Redirect ke halaman yang sesuai setelah penyimpanan
        return redirect('/ulasans')->with('success', 'Ulasan berhasil disimpan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUlasanRequest $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
