<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.review.index', [
            'reviews' => Review::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('admin.review.create');
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
            'status'=> 'required'
        ]);
        Review::create($validatedData);

        return redirect('/dashboard/review')->with('success', 'New Review has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        // Menampilkan data spesifik tiap review (READ)
        return view('admin.review.show', [
            'review' => $review
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        // menampilkan view untuk update
        return view('admin.review.edit', [
            'review' => $review
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // dd($request);
        //proses update
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'body' => 'required'
        ];
        $validatedData = $request->validate($rules);

        Review::where('id', $review->id)
            ->update($validatedData);

        return redirect('/dashboard/review')->with('success', 'Review has been updated!');
    }
    
    public function approve(Review $review)
    {
        $review->update(['status' => true]);
        return redirect('/dashboard/review')->with('success', 'Review has been approved');
    }
    
    public function notapprove(Review $review)
    {
        $review->update(['status' => false]);
        return redirect('/dashboard/review')->with('success', 'Review has not been approved');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        Review::destroy($review->id);
        return redirect('/dashboard/review')->with('success', 'Review has been deleted');
    }    
}
