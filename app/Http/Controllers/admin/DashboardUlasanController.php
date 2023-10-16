<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardUlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ulasan.index', [
            'ulasan' => Ulasan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('admin.ulasan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'isi' => 'required',
            'status'=> 'required'
        ]);
        Ulasan::create($validatedData);

        return redirect('/dashboard/ulasan')->with('success', 'New Ulasan has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        // Menampilkan data spesifik tiap ulasan (READ)
        return view('admin.ulasan.show', [
            'ulasan' => $ulasan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        // menampilkan view untuk update
        return view('admin.ulasan.edit', [
            'ulasan' => $ulasan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'isi' => 'required',
            'status'=> 'required'
        ];
        $validatedData = $request->validate($rules);

        Ulasan::where('id', $ulasan->id)
            ->update($validatedData);

        return redirect('/dashboard/ulasan')->with('success', 'Ulasan has been updated!');
    }
    
    public function approve(Ulasan $ulasan)
    {
        $ulasan->update(['status' => true]);
        return redirect('/dashboard/ulasan')->with('success', 'Ulasan has been approved');
    }
    
    public function notapprove(Ulasan $ulasan)
    {
        $ulasan->update(['status' => false]);
        return redirect('/dashboard/ulasan')->with('success', 'Ulasan has not been approved');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        Ulasan::destroy($ulasan->id);
        return redirect('/dashboard/ulasan')->with('success', 'Ulasan has been deleted');
    }    
}
