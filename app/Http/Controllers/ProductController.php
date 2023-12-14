<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtitle = '';
        $active = '';
        $search = '';
        $sortOrder = 'asc';
        $sortColumn = 'created_at';
        $status=true;
        if(request('status')){
            $status = request('status');
        }
        if(request('search')){
            $search = request('status');
        }
        if(request('sort')){
            $sortOrder = request('sort_order');
            $sortColumn = request('sort_column');
        }
        if(request('subcategory')){
            $subcategory = SubCategory::firstWhere('id', request('subcategory'));
            $subtitle = $subcategory->name;
            $active = $subcategory->id;
        }
        return view("frontend.product", [
            'subtitle'=>$subtitle,
            'active'=> $active,
            'search'=>$search,
            'categories'=> Category::all(),
            'subcategories' => SubCategory::orderBy('id')->get(),   
            'products'=>Product::latest()->filter(request(['search','subcategory']))->where('status',$status)->orderBy($sortColumn, $sortOrder)->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('frontend.productshow', [
            "title" => "Single product",
            "active" => "product",
            "product" => $product
        ]);
    }

}
