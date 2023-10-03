<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUlasanRequest;
use Exception;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Validasi data jika diperlukan
        // $request->validate([
        //     'nama' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'isi' => 'required',
        // ]);

        // Inisialisasi variabel $status dengan nilai default false
        $status = false;

        // Simpan ulasan ke database
        $ulasan = Ulasan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
            'status' => $status
        ]);
        return redirect('/ulasan')->with('success', 'Ulasan berhasil disimpan!');
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
