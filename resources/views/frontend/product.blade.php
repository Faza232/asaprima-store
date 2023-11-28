@extends('layout.main')
@section('container')    
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->

  <div class="container mx-auto px-4 flex">
  <aside class="relative w-64 h-screen max-h-[30vh] overflow-y-auto bg-gray-50 dark:bg-gray-800" aria-label="Sidebar">
    <h1 class>category</h1>
    <div class="px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <!-- Menu Dropdown 1 -->
                @foreach($categories as $category)
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="{{ $category->id }}" data-collapse-toggle="{{ $category->id }}" >
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $category->name }}</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="{{ $category->id }}" class="hidden py-2 space-y-2">
                  @foreach($subcategories as $subcategory)
                  @if($subcategory->category_id == $category->id)
                      <li>
                          <a href="/product?subcategory={{ $subcategory->id }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11" data-subcategory-id="{{ $subcategory->id }}">{{ $subcategory->name }}</a>
                      </li>
                  @endif              
              @endforeach                           
              </ul>
                @endforeach

            </li>
        </ul>
    </div>
</aside>

<div class="sm:ml-4 flex-1 z-20">
    <div class="relative m-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5">
      @if($products->isEmpty())
      <p>Belum ada produk</p>
      @endif
      @foreach($products as $product)
    <div class="relative max-w-xs min-w-[200px] bg-white shadow-md rounded-lg mx-1 my-3 cursor-pointer">
      <div class="overflow-x-hidden rounded-t-lg relative">
        <img class="h-40 w-full object-cover" src="{{ $product->image }}">
      </div>
      <div class="mt-4 pl-2 mb-2 justify-between ">
        <div>
          <p class="p-2 font-semibold text-sm text-gray-900 mb-0">{{ $product->name }}</p>
        </div>
      </div>
    </div>
 @endforeach
    </div>
 </div>
  {{-- <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script> --}}
  </div>
  @endsection