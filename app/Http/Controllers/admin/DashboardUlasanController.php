<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DashboardUlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ulasan.index', [
            'ulasan' => Ulasan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view ('dashboard.ulasan.create');
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
            'status'=> 'required'
        ]);
        Ulasan::create($validatedData);

        return redirect('/dashboard/ulasan')->with('success', 'New Ulasan has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        // Menampilkan data spesifik tiap ulasan (READ)
        return view('dashboard.posts.show', [
            'ulasan' => $ulasan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function aprove(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //proses update
        $rules = [
            'nama' => 'required|max:255',
            'email' => 'required|max:255',
            'isi' => 'required',
            'status'=> 'required'
        ];
        $validatedData = $request->validate($rules);

        Ulasan::where('id', $ulasan->id)
            ->update($validatedData);

        return redirect('/dashboard/Ulasan')->with('success', 'Ulasan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            //Get Ulasan
            $ulasan = Ulasan::find($id);

            //check if Ulasan exists
            if (!$ulasan) {
                throw new Exception('Ulasan not Found');
            }

            //Delete Ulasan
            $ulasan->delete();

            return ResponseFormatter::success('Ulasan deleted');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(),500);
        }
    }
}
