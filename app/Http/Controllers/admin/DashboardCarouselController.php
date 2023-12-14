<?php

namespace App\Http\Controllers\admin;

use App\Models\Carousel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Carousel::get();
    
        return view('admin.carousel.index', [
            'count' => Carousel::count(),
            'images' => $images
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Proses Menyimpan data
        $validatedData = $request->validate([
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|size:10240',
        ]);
        // Buat name foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $nameFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galery', $nameFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 75);

        Carousel::create($validatedData);

        return redirect('/dashboard/carousel')->with('success', 'New Carousel has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        // Menampilkan data spesifik tiap Carousel (READ)
        return view('admin.carousel.show', [
            'carousel' => $carousel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', [
            'carousel' => $carousel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        
        //proses update
        $rules = [
            'link' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Carousel::where('id', $carousel->id)
            ->update($validatedData);

        return redirect('/dashboard/carousel')->with('success', 'Carousel has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        // Hapus data
        if($carousel->image){
            $imagepath=public_path($carousel->image);
            unlink($imagepath);
        }

        Carousel::destroy($carousel->id);   // delete from post where id = slug
        return redirect('/dashboard/carousel')->with('success', 'Post has been deleted');
    }
}
