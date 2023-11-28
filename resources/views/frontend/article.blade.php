@extends('layout.main')
@section('container')

<!-- Weekly Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
<h2 class="mb-12 text-center text-3xl font-bold">Newest Article</h2>

@if($articles->count())
    <div class="mb-10 rounded overflow-hidden flex flex-col mx-auto">
        <a href="/article/{{ $articles[0]->slug }}"
            class="text-xl sm:text-4xl font-semibold inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">The
            {{ $articles[0]->title }}
        </a>
        <div class="relative">
            <a href="/article/{{ $articles[0]->slug }}">
              @if($articles[0]->image)
              <img class="w-full"
              sr="{{ $articles[0]->image }}"
              alt="image">
              @else
                <img class="w-full"
                    src="https://images.pexels.com/photos/3683074/pexels-photo-3683074.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=625.0&amp;sharp=10&amp;w=1500"
                    alt="image">
              @endif
            </a>

            <a href="/articles/{{ $articles[0]->slug }}"
                class="hidden absolute z-10 text-xs absolute bottom-0 right-0 bg-indigo-600 px-6 m-2 py-2 text-white hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out sm:flex items-center"><span
                class="text-lg">|</span>&nbsp;&nbsp;<span>Read more</span>
            </a>

        </div>
        <p class="text-gray-700 py-5 text-base leading-8">
        {{ $articles[0]->excerpt }}
        </p>
        <div class="py-5 text-sm font-regular text-gray-900 flex">
            <span class="mr-3 flex flex-row items-center">
                <svg class="text-indigo-600" fill="currentColor" height="13px" width="13px" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
			c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
			c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                        </g>
                    </g>
                </svg>
                <span class="ml-1">6 mins ago</span></span>
            <a href="#" class="flex flex-row items-center hover:text-indigo-600">
                <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true" role="img"
                    focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                    </path>
                    <path d="M0 0h24v24H0z" fill="none"></path>
                </svg>
                <span class="ml-1">PT Asa Prima Niaga</span></a>
        </div>
        <hr>

    </div>

@foreach ($articles->skip(1) as $article)
<!-- List Card -->
<div class="container my-24 mx-auto md:px-6">
  <!-- Section: Design Block -->
  <section class="mb-32 text-center md:text-left">

    <div class="mb-6 flex flex-wrap">
      <div class="mb-6 ml-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-3/12">
        <div class="relative mb-6 overflow-hidden rounded-lg bg-cover bg-no-repeat shadow-lg dark:shadow-black/20"
          data-te-ripple-init data-te-ripple-color="light">
          @if($article->image)
          <img src="{{ $article->image }}" class="w-full" alt="Louvre" />
          @else
          <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/059.jpg" class="w-full" alt="Louvre" />
          @endif
          <a href="/article/{{ $article->slug }}">
            <div
              class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100 bg-[hsla(0,0%,98.4%,.15)]">
            </div>
          </a>
        </div>
      </div>

      <div class="mb-6 mr-auto w-full shrink-0 grow-0 basis-auto px-3 md:mb-0 md:w-9/12 xl:w-7/12">
        <a href="/article/{{ $article->slug }}">
        <h5 class="mb-3 text-lg font-bold">{{ $article->title }}</h5>
        </a>
        <div class="mb-3 flex items-center justify-center text-sm font-medium text-yellow-600 md:justify-start">
        </div>
        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
          <small>Published <u>{{ $article->formatted_created_date }}</u> by
            <a href="#!">PT Asa Prima Niaga</a></small>
        </p>
        <p class="text-neutral-500 dark:text-neutral-300">
          {{ $article->excerpt }}
        </p>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</div>
<!-- Container for demo purpose -->
@endforeach
@else
<p class="text-center fs-4">No article found</p>
@endif
</div>
<!-- End Card Blog -->
@endsection