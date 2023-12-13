@extends('layout.main')
@section('container')
<title>Products</title>
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <section class="py-6 px-6 sm:px-8 md:px-16 lg:px-32">
  <div class="mb-6 flex flex-col sm:flex-row justify-between">
    <div>
      <div class="mb-6 text-md">
        Product
      </div>
    </div>
    {{-- <form action="/product" method="GET">
      <div class="flex relative mt-6 max-w-lg mx-auto px-14">
        <input name="search" id="search" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="text" placeholder="Search">
        <button class="rounded-lg border bg-main p-2 ml-2 text-gray-100" type="submit">
          <svg class="h-5 w-5 text-gray-100" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></button>
      </div>
  </form> --}}
  <form action="/product" class="flex flex-row space-x-3" method="GET">
        
    <div class="flex items-center">   
      <input type="text" id="search" name="search" class="bg-neutral-50 border border-gray-300 text-gray-900 focus:shadow-sm focus:shadow-[#EA6C20]/10 focus:border-[#EA6C20] focus:ring-0 text-sm rounded-lg block w-full p-2.5" placeholder="Type here..." required="">
      <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-[#EA6C20] rounded-lg border hover:bg-orange-600">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
          </svg>
          <span class="sr-only">Search</span>
      </button>
    </div>
    </form>
  </div>

  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>

    <aside id="logo-sidebar" class="relative top-0 left-0 z-40 w-max sm:max-h-100 md:h-max lg:h-max transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
      <div class="my-4 ml-4 px-3 py-2 rounded-xl shadow-lg overflow-y-auto md:h-max lg:h-max bg-neutral-50 border border-gray-200">
        <h3 class="text-main text-2xl py-4 font-medium text-center">category</h3>
        <hr class="h-px mt-0 mb-3 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
          <ul class="space-y-2">
              <li>
                  <!-- Menu Dropdown 1 -->
                  @foreach($categories as $category)
                  <button type="button" class="flex items-center w-full p-2 text-base font-semibold text-main transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="{{ $category->id }}" data-collapse-toggle="{{ $category->id }}" >
                      <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-main" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $category->name }}</span>
                      <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                  <ul id="{{ $category->id }}" class="hidden py-2 space-y-2">
                    @foreach($subcategories as $subcategory)
                    @if($subcategory->category_id == $category->id)
                        <li>
                            <a href="/product?subcategory={{ $subcategory->id }}"class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100" data-subcategory-id="{{ $subcategory->id }}">{{ $subcategory->name }}
                            </a>
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
      <div class="relative m-3 grid grid-cols-1  lg:grid-cols-2 xl:grid-cols-3 gap-5 font-semibold">
        @if($products->isEmpty())
        <p>Belum ada produk</p>
        @endif
        @foreach($products as $product)
        <a href="/product/{{ $product->slug }}">
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
        </a>
   @endforeach
      </div>
   </div>
  </section>
    @endsection
    