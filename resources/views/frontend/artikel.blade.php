@extends('layout.main')
@section('container')

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">ARTIKEL</h2>
    <p class="mt-1 text-gray-600 dark:text-gray-400"></p>
  </div>
  <!-- End Title -->

  <!-- Grid -->
  
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($artikel as $artikel)
    <!-- Card -->
    <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all duration-300 rounded-xl p-5 dark:border-gray-700 dark:hover:border-transparent dark:hover:shadow-black/[.4]" href='/artikel/show'>

    @if ($artikel->image)
      <div class="aspect-w-16 aspect-h-11">
      <img src="{{ asset('storage/'.$artikel->image) }}" class="img-fluid" alt="{{ $artikel->image }}">
      </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $artikel }}" class="img-fluid mt-3" alt="{{ $artikel}}">
    @endif

      <div class="my-6">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:group-hover:text-white">
          {{$artikel->title}}
        </h3>
        <p class="mt-5 text-gray-600 dark:text-gray-400">
        {{$artikel->excerpt}}
        </p>
      </div>
      <div class="mt-auto flex items-center gap-x-3">
        <img class="w-8 h-8 rounded-full" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Image Description">
        <div>
          <h5 class="text-sm text-gray-800 dark:text-gray-200">By PT Asa Prima Niaga</h5>
        </div>
      </div>
    </a>
    <!-- End Card -->
    @endforeach
  </div>
  <!-- End Grid -->

  <!-- Card -->
  <div class="mt-12 text-center">
    <a class="inline-flex justify-center items-center gap-x-2 text-center bg-white border hover:border-gray-300 text-sm text-blue-600 hover:text-blue-700 font-medium hover:shadow-sm rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:bg-slate-900 dark:border-gray-700 dark:hover:border-gray-600 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:shadow-slate-700/[.7] dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" href="#">
      Read more
      <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </a>
  </div>
  <!-- End Card -->
</div>
<!-- End Card Blog -->
@endsection