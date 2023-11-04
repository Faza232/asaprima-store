<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status=true;
        if(request('status')){
            $status = request('status');
        }
        
        return view('frontend.artikel', [
            "title" => "All artikel",
            "active" => "artikel",
            "artikel" => Artikel::latest()
            ->filter(request('search'))
            ->where('status',$status)
            ->orderBy("created_at","desc")
            ->paginate(9)
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(artikel $artikel)
    {
        return view('frontend.artikelshow', [
            "title" => "Single artikel",
            "active" => "artikel",
            "artikel" => $artikel
        ]);
    }
}
