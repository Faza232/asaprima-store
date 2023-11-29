@extends('layout.admin')

@section('container')

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Update Post</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/review/{{$review->id}}" enctype="multipart/form-data">
      @csrf
      {{-- Nama --}}
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('name', $review->name) }}">
      </div>

      {{-- Email --}}
      <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('email', $review->email) }}">
      </div>

      {{-- Body --}}
      <div class="relative mb-6">
        <label for="body" class="mb-2 inline-block text-sm text-neutral-700 font-medium">Ulasan</label>
        <textarea class="full-featured-non-premium" id="body" name="body">{{ old('body', $review->body) }}</textarea>        
      </div>

      {{-- Button --}}
      <a href="/dashboard/review">
        <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Update Post</button>
  </form>
  </div>
</div>

@endsection

@section('content-js')

@vite('public/assets/js/tinymce.js')
    
@endsection
