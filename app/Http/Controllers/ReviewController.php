<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReviewRequest;

use Exception;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.review', [
            "tittle" => "Review",
            "active" => "review",
            'reviews' => Review::latest()
                ->where('status', true)
                ->select('name', 'body')
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'body' => 'required',
        ]);
        Review::create($validatedData);

        return redirect('/review')->with('success', 'New post has been added!');
    }
}
