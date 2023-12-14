<?php

namespace App\Http\Controllers\admin;

use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DashboardCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.certificate.index', [
            'certificates'=>Certificate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Proses Menyimpan data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug'=> 'required',
            'year'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|size:10240',
        ]);
        // Buat name foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $nameFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galery', $nameFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 75);

        Certificate::create($validatedData);

        return redirect('/dashboard/certificate')->with('success', 'New Certificate has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        // Menampilkan data spesifik tiap Certificate (READ)
        return view('admin.certificate.show', [
            'certificate' => $certificate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificate.edit', [
            'certificate' => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        
        //proses update
        $rules = [
            'name' => 'required|max:255',
            'slug'=> 'required',
            'year'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|size:10240',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                $imagepath=public_path($request->oldImage);
                if(file_exists($imagepath)) {
                    unlink($imagepath);
            }
            $extFile = $request->image->getClientOriginalExtension();
            $nameFile = Str::random(10) . time() . '.' . $extFile;

            $path = $request->image->move('image/galery', $nameFile);
            $path = str_replace('\\', '/', $path);

            $validatedData['image'] = $path;
            }
        }

        Certificate::where('id', $certificate->id)
            ->update($validatedData);

        return redirect('/dashboard/certificate')->with('success', 'Certificate has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        // Hapus data
        if($certificate->image){
            $imagepath=public_path($certificate->image);
            unlink($imagepath);
        }

        Certificate::destroy($certificate->id);   // delete from post where id = slug
        return redirect('/dashboard/certificate')->with('success', 'Post has been deleted');
    }
}
