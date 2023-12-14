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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|size:10240',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'nullable|string',
            'status'=>'required'
        ]);
        // Buat name foto agar tidak tabrakan
        if($request->file('image')) {
        $extFile = $request->image->getClientOriginalExtension();
        $nameFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $nameFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        }
        if (!$request->has('description')) {
            return redirect()->back()->with('error', 'Description is required.');
        }
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|size:10240',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'nullable|string'
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

    public function approve(Product $product)
    {
        $product->update(['status' => true]);
        return redirect('/dashboard/product')->with('success', 'product has been approved');
    }
    
    public function notapprove(Product $product)
    {
        $product->update(['status' => false]);
        return redirect('/dashboard/product')->with('success', 'product has not been approved');
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