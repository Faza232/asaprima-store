@extends('layout.main')

@section('container')

    <div>
        <div>
            <div>
                <h1>{{ $article->title }}</h1>

                @if ($article->image)
                    <div>
                        <img src="{{$article->image}}" alt="{{ $article->image }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $article->titile }}" alt="{{ $article->titile }}">
                @endif

                <article>
                    {!! $article->body !!}
                </article>
            <br>
                <a href="/article">Back to article</a>
            </div>
        </div>
    </div>

@endsection