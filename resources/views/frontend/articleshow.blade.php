@extends('layout.main')
@section('container')

<div>
    <div>
        <div class="container mx-auto px-40">
            <h1 class="text-center text-2xl font-bold uppercase">{{ $article->title }}</h1>

            @if ($article->image)
                <div class="flex items-center justify-center">
                    <img src={{ asset($article->image) }} alt="{{ $article->image }}">
                </div>
            @else
                <div class="flex items-center justify-center">
                    <img src="https://source.unsplash.com/1200x400?{{ $article->title }}" alt="{{ $article->title }}">
                </div>
            @endif

            <article class="mt-8 text-justify">
                {!! $article->body !!}
            </article>

            <br>

            <div class="flex justify-center mt-4">
                <a href="/article" class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Back to article
                </a>
            </div>
        </div>
    </div>
</div>


@endsection