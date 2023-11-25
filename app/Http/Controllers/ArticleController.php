<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status=true;
        if(request('status')){
            $status = request('status');
        }
        
        return view('frontend.article', [
            "title" => "All article",
            "active" => "article",
            "articles" => Article::latest()
            ->selectRaw('*, DATE_FORMAT(CONVERT_TZ(created_at, "+00:00", "+07:00"), "%d %M %Y") as formatted_created_date')
            ->where('status',$status)
            ->orderBy("created_at","desc")
            ->paginate(9)
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('frontend.articleshow', [
            "title" => "Single article",
            "active" => "article",
            "article" => $article
        ]);
    }
}
