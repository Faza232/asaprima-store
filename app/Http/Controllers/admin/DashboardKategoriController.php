<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class DashboardKategoriController extends Controller
{
    public function index()
    {
        return view('admin.kategori.index', [
            'kategoris' => Kategori::all()
        ]);
    }
}
