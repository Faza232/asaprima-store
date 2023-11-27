<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produkid = $request->produkid;
        foreach($request->item as $key => $items)
        {
            $variationadd['cat_no']            = $items;
            $variationadd['produk_id'] = $produkid;
            $variationadd['deskripsi']     = $request->description[$key];

            Variation::create($variationadd);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Variation $variation)
    {
        //
    }
}
