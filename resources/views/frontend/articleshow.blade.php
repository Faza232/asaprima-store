@extends('layout.main')
@section('container')

<div>
    <div>
        <div class="container mx-auto">
            <h1 class="text-center text-2xl font-bold uppercase">{{ $article->title }}</h1>

            @if ($article->image)
                <div class="flex items-center justify-center">
                    <img src="{{$article->image}}" alt="{{ $article->image }}">
                </div>
            @else
            <div class="flex items-center justify-center">
                <img src="https://source.unsplash.com/1200x400?{{ $article->titile }}" alt="{{ $article->titile }}">
            </div>
            @endif

            <article class="mt-8 text-center">
                {!! $article->body !!}
            </article>


            <br>

            <div class="flex justify-center mt-4">
                <a href="/article" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back to article
                </a>
            </div>
        </div>
    </div>
</div>


@endsection