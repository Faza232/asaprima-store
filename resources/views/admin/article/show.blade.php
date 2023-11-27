{{-- ambil halaman main --}}
@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $article->title }}</h1>

            <a href="/dashboard/articles" class="btn btn-success mx-1"><span data-feather="arrow-left"></span> Back to all my articles</a>
            <a href="/dashboard/articles/{{ $article->slug }}/edit" class="btn btn-warning mx-1"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/articles/{{ $article->slug }}" method="article" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

            @if ($article->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid mt-3" alt="{{ $article->image }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" class="img-fluid mt-3" alt="{{ $article->category->name }}">
            @endif

            <article class="my-3 fs-6">
                {!! $article->body !!}
            </article>
        </div>
    </div>
</div>
@endsection