<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    public function index()
    {
        $title = '';
        $active = null;
        if (request('subcategory_id')) {
            $subcategory = SubCategory::find(request('subcategory_id'));
            if ($subcategory) {
                $title = ' in ' . $subcategory->name;
                $active = $subcategory->id;
            }
        } elseif (request('category_id')) {
            $category = Category::find(request('category_id'));
            if ($category) {
                $title = ' in ' . $category->name;
                $active = $category->id;
            }
        }
    
        $productQuery = Product::latest()->filter(request(['category_id', 'subcategory_id']));
    
        return view('admin.product.index', [
            'products' => $productQuery->paginate(7)->withQueryString(),
            'categories' => Category::all(),
            'title' => $title,
            'active' => $active,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $categoryId = request('kategory_id');
        
        return view('admin.product.create', [
            'categories' => Category::all()
        ]);
    }

        public function getSubCategory($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:5048',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required'
        ]);

        // Buat name foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $nameFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $nameFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 75);
    

        Product::create($validatedData);

        return redirect('/dashboard/product')->with('success', 'New Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'image|file|max:5048',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                $imagepath=public_path($request->oldImage);
                if(file_exists($imagepath)) {
                    unlink($imagepath);
            }
            $extFile = $request->image->getClientOriginalExtension();
            $nameFile = Str::random(10) . time() . '.' . $extFile;

            $path = $request->image->move('image/galeri', $nameFile);
            $path = str_replace('\\', '/', $path);

            $validatedData['image'] = $path;
            }
        }

        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/product')->with('success', 'New Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        // Hapus data
        if($product->image){
            $imagepath=public_path($product->image);
            unlink($imagepath);
        }

        Product::destroy($product->id);   // delete from post where id = slug
        return redirect('/dashboard/product')->with('success', 'Post has been deleted');
    }
}