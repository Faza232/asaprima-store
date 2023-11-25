<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;


class DashboardSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subkategori.index', [
            'subkategori' => SubCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $kategori){
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
        SubCategory::create($validatedData);

        return redirect('/dashboard/subkategori')->with('success', 'New SubCategory has been added!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subkategori)
    {
        // menampilkan view untuk update
        return view('admin.subkategori.edit', [
            'subkategori' => $subkategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subkategori)
    {
        // dd($request);
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required|max:255',
            'kategori_id' => 'required'
        ];
        $validatedData = $request->validate($rules);

        SubCategory::where('id', $subkategori->id)
            ->update($validatedData);

        return redirect('/dashboard/subkategori')->with('success', 'SubCategory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subkategori)
    {
        SubCategory::destroy($subkategori->id);
        return redirect('/dashboard/subkategori')->with('success', 'SubCategory has been deleted');
    }    
}
