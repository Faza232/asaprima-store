<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
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
        try {
            $muzaki = Ulasan::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'noTelp' => $request->noTelp,
                'npwp' => $request->npwp
            ]);
            
            if(!$muzaki)
            {
                throw new Exception('Muzaki not created');
            }
    
            return ResponseFormatter::success($muzaki, 'Muzaki successfully added');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
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
