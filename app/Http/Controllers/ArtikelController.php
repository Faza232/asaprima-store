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
        return view('frontend.artikel', [
            "title" => "All artikel",
            "active" => "artikel",
            "artikel" => Artikel::latest()
            ->take(20)
            ->get()
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
