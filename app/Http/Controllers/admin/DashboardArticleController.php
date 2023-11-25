<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles'=>Article::selectRaw('*, DATE_FORMAT(CONVERT_TZ(created_at, "+00:00", "+07:00"), "%d %M %Y") as formatted_created_date')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Proses Menyimpan data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'body' => 'required',
            'image' => 'nullable|image|file|max:3000',
            'status'=>'required'
        ]);
        // Buat nama foto agar tidak tabrakan
        $extFile = $request->image->getClientOriginalExtension();
        $namaFile = Str::random(10) . time() . '.' . $extFile;

        $path = $request->image->move('image/galeri', $namaFile);
        $path = str_replace('\\', '/', $path);

        $validatedData['image'] = $path;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 75);

        Article::create($validatedData);

        return redirect('/dashboard/article')->with('success', 'New Article has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // Menampilkan data spesifik tiap Article (READ)
        return view('admin.article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        return view('admin.article.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        
        //proses update
        $rules = [
            'title' => 'required|max:255',
            'slug'=> 'required',
            'image' => 'image|file|max:3000',
            'body' => 'required'
        ];

        if($request->slug != $article->slug){
            $rules['slug'] = 'required|unique:Article';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                $imagepath=public_path($request->oldImage);
                if(file_exists($imagepath)) {
                    unlink($imagepath);
            }
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = Str::random(10) . time() . '.' . $extFile;

            $path = $request->image->move('image/galeri', $namaFile);
            $path = str_replace('\\', '/', $path);

            $validatedData['image'] = $path;
            }
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Article::where('id', $article->id)
            ->update($validatedData);

        return redirect('/dashboard/article')->with('success', 'Article has been updated!');
    }

    public function approve(Article $article)
    {
        $article->update(['status' => true]);
        return redirect('/dashboard/article')->with('success', 'article has been approved');
    }
    
    public function notapprove(Article $article)
    {
        $article->update(['status' => false]);
        return redirect('/dashboard/article')->with('success', 'article has not been approved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Hapus data
        if($article->image){
            $imagepath=public_path($article->image);
            unlink($imagepath);
        }

        Article::destroy($article->id);   // delete from post where id = slug
        return redirect('/dashboard/article')->with('success', 'Post has been deleted');
    }
}
