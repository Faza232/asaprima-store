<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUlasanRequest;

use Exception;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.ulasan', [
            "tittle" => "Ulasan",
            "active" => "ulasan",
            'ulasan' => Ulasan::latest()
                ->where('status', true)
                ->select('nama', 'isi')
                ->take(3)
                ->get()
        ]);
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'isi' => 'required',
        ]);
        Ulasan::create($validatedData);

        return redirect('/ulasan')->with('success', 'New post has been added!');
    }
}
