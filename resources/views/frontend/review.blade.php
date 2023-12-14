@extends('layout.main')
@section('container')
<div class="container mx-auto px-40">
<div class="mb-8 text-center">
    <h3 class="text-gray-600 text-2xl font-medium text-center mt-8 bold">Testimonials</h3>
    <p class="text-lg text-gray-600">What others say about us</p>
</div>
<div class="lg:grid lg:grid-cols-3 sm:px-6 lg:px-8">
  @foreach ($reviews as $review)

    <div class="p-4 text-gray-800 rounded-lg shadow-md">
          <div class="mb-2">
              <p class="mb-2 text-center text-gray-600 ">
                  {{ $review->body }}
              </p>
              <div class="flex flex-col items-center justify-center">
                  <h5 class="font-bold text-main">Name</h5>
                  <p class="text-sm text-gray-600">{{ $review->name }}</p>
                  <!-- <p class="center">Customer</p> -->
              </div>
          </div>
    </div>
  @endforeach
</div>
</div>

<div class="container mx-auto px-40">
<form action="/review" method="POST">
  @csrf
  <div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anda</label>
    <input type="name" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nama" required>
  </div>
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
    <input type="email" name="email" id="email" autocomplete="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email Anda" required>
  </div>
  <div class="mb-6">
    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulasan Anda</label>
    <input type="text" name="body" id="body" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Ulasan Anda" required>
  </div>
  <div class="flex justify-center items-center">
  <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>

</form>
</div>
@endsection