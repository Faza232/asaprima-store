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
            "artikel" => Artikel::all()
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(artikel $artikel)
    {
        return view('artikel', [
            "title" => "Single artikel",
            "active" => "artikel",
            "artikel" => $artikel
        ]);
    }
}