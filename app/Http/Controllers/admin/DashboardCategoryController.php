<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
            'subcategories' => SubCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);
        Category::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'New Category has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Menampilkan data spesifik tiap category (READ)
        return view('admin.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // menampilkan view untuk update
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request);
        //proses update
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'Category has been updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }    
}
