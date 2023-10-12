<?php

namespace App\Http\Controllers\admin;

use App\Models\SubKategori;
use App\Http\Requests\StoreSubKategoriRequest;
use App\Http\Requests\UpdateSubKategoriRequest;
use App\Http\Controllers\Controller;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index', [
            'subkategoris' => SubKategori::all()
        ]);
    }
}
