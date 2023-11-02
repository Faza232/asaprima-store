<?php

namespace App\Http\Controllers\admin;

use App\Models\Sertifikat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sertifikat.index', [
            'sertifikat'=>Sertifikat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Proses Menyimpan data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug'=> 'required',
            'tahun'=> 'required',
            'image' => 'nullable|image|file|max:3000',
        ]);
        // Buat nama foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $namaFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $namaFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 75);

        Sertifikat::create($validatedData);

        return redirect('/dashboard/sertifikat')->with('success', 'New Sertifikat has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sertifikat $sertifikat)
    {
        // Menampilkan data spesifik tiap Sertifikat (READ)
        return view('admin.sertifikat.show', [
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sertifikat $sertifikat)
    {
        return view('admin.sertifikat.edit', [
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sertifikat $sertifikat)
    {
        
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'slug'=> 'required',
            'tahun'=> 'required',
            'image' => 'nullable|image|file|max:3000',
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

        Sertifikat::where('id', $sertifikat->id)
            ->update($validatedData);

        return redirect('/dashboard/sertifikat')->with('success', 'Sertifikat has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sertifikat $sertifikat)
    {
        // Hapus data
        if($sertifikat->image){
            $imagepath=public_path($sertifikat->image);
            unlink($imagepath);
        }

        Sertifikat::destroy(@$sertifikat->id);   // delete from post where id = slug
        return redirect('/dashboard/sertifikat')->with('success', 'Post has been deleted');
    }
}