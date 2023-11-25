<?php

namespace App\Http\Controllers;

use App\Models\variation;
use App\Http\Requests\StorevariationRequest;
use App\Http\Requests\UpdatevariationRequest;

class DashboardVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.variation.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorevariationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatevariationRequest $request, variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(variation $variation)
    {
        //
    }
}
