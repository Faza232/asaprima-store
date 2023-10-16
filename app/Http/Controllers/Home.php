<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('index', [
            "tittle" => "Ulasan",
            "active" => "ulasan",
            'ulasan' => Ulasan::latest()
                ->where('status', true)
                ->select('nama', 'isi')
                ->take(3)
                ->get()
        ]);
    }
}
