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
        return view('admin.subcategory.index', [
            'subcategory' => SubCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category){
        return view ('admin.subcategory.create');
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
            'category_id' => 'required'
        ]);
        SubCategory::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'New SubCategory has been added!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        // menampilkan view untuk update
        return view('admin.subcategory.edit', [
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        // dd($request);
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required|max:255',
            'category_id' => 'required'
        ];
        $validatedData = $request->validate($rules);

        SubCategory::where('id', $subcategory->id)
            ->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'SubCategory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        SubCategory::destroy($subcategory->id);
        return redirect('/dashboard/category')->with('success', 'SubCategory has been deleted');
    }    
}
