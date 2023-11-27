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
        $title = '';
        $active = '';

        if(request('subcategory')){
            $subcategory = SubCategory::firstWhere('id', request('subcategory'));
            $title = ' in '.$subcategory->name;
            $active = $subcategory->id;
        }
        return view("frontend.product", [
            'active'=> $active,
            'categories'=> Category::all(),
            'subcategories'=>SubCategory::all(),
            'products'=>Product::latest()->filter(request(['subcategory']))->paginate(7)->withQueryString()
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
