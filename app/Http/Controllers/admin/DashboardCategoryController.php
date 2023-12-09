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
            'name' => 'required|max:255'
        ]);
    
        // Membuat slug dari nama
        $slug = strtolower(str_replace(' ', '-', $validatedData['name']));
        $validatedData['slug'] = $slug;
    
        // Membuat kategori baru
        Category::create($validatedData);
    
        return redirect('/dashboard/category')->with('success', 'New Category has been added!');
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi data jika diperlukan
        $rules = [
            'name' => 'required|max:255'
        ];
        $validatedData = $request->validate($rules);
    
        // Membuat slug dari nama
        $slug = strtolower(str_replace(' ', '-', $validatedData['name']));
        $validatedData['slug'] = $slug;
    
        // Proses update
        Category::where('id', $category->id)
            ->update($validatedData);
    
        return redirect('/dashboard/category')->with('success', 'Category has been updated!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }    
}
