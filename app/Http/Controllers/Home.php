<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('index', [
            "tittle" => "Home",
            "active" => "Home",
            'reviews' => Review::latest()
                ->where('status', true)
                ->select('name', 'body')
                ->take(3)
                ->get()
        ]);
    }
    public function contact(){
        return view('frontend.contact');
    }
}
