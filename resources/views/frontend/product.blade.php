@extends('layout.main')
@section('container')
<title>Products</title>
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <section class="">
       <div
          class="relative overflow-hidden bg-cover bg-center p-12 text-center h-[600px] md:h-[400px]"
          style="background-image: url('/img/Asa_Gedung.jpg')">
          <div
            class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden"
            style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center p-8 md:px-32 lg:px-60">
              <div class="text-white text-left border-l-4 border-main">
                <h1 class="ml-4 mb-4 text-3xl md:text-5xl font-semibold">Products</h1>
                <p class="ml-4"><a href="/" class="hover:text-[#039845]">Home</a><span class="mx-2">></span><a href="/product" class="hover:text-[#039845]">Products</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="py-6 sm:py-8 md:py-12 bg-neutral-50">
            <h1 class="font-medium text-xl text-center text-gray-700 sm:text-2xl lg:text-3xl">Stok Berjalan</h1>
        </div>
      
      
    <div class="py-6 px-6 sm:px-8 md:px-16 lg:px-32 mb-6 ml-10 flex flex-col sm:flex-row justify-between">
      <form action="/product" class="flex flex-row space-x-3" method="GET">
        <div class="flex items-center">   
          <input type="text" id="search" name="search" class="bg-neutral-50 border border-gray-300 text-gray-900 focus:shadow-sm focus:shadow-[#EA6C20]/10 focus:border-green-500  focus:ring-0 text-sm rounded-lg block w-full p-2.5" placeholder="Type here..." required="">
          <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-green-700 rounded-lg border hover:bg-green-500">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
              </svg>
              <span class="sr-only">Search</span>
          </button>
        </div>
        </form>
    </div>
    <div class="flex flex-col bg-white mb-6">
      <div class="relative md:flex items-start mx-auto max-w-2xl lg:max-w-7xl 2xl:max-w-full">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 group sm:hidden">
          <svg class="w-4 h-4 mr-2 group-hover:text-main" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
          <span class="text-sm group-hover:text-main">Category</span>
       </button>

        <aside id="logo-sidebar" class="absolute md:relative md:px-5 lg:px-10 top-0 left-0 z-40 w-max transition-transform -translate-x-[150%] md:translate-x-0" aria-label="Sidebar">
          <div class=" my-4 ml-4 px-3 py-2 rounded-xl shadow-lg h-96 md:h-max overflow-y-auto bg-neutral-50 border border-gray-200">
            <h3 class="text-main text-2xl py-4 font-medium text-center">category</h3>
            <hr class="h-px mt-0 mb-3 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
              <ul class="space-y-2">
                  <li>
                      <!-- Menu Dropdown 1 -->
                      @foreach($categories as $category)
                      <button type="button" class="flex items-center w-full p-2 text-base font-semibold text-main transition duration-75 rounded-lg group hover:bg-gray-100" aria-controls="{{ $category->id }}" data-collapse-toggle="{{ $category->id }}" >
                          <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-main" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                          <span class=" ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $category->name }}</span>
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
    
        <div class="max-w-2xl lg:max-w-7xl 2xl:max-w-full w-max">
          <div class="py-4">
          @if($search)
          <h3 class=" text-center text-gray-700 text-2xl">Anda Mencari "{{ $search }}"</h3>
          @endif
          @if($subtitle)
          <h3 class="text-center font-semibold text-gray-700 text-2xl">{{ $subtitle }}</h3>
          @endif
          @if($products->isEmpty())
          <h3 class="text-center font-semibold text-gray-400 text-2xl">Belum Ada Produk Tersedia</h3>
          @endif
          </div>
          <div class="grid grid-cols-2 gap-x-4 gap-y-3 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 xl:gap-x-8 2xl:grid-cols-4">
            @foreach($products as $product)
            <a href="/product/{{ $product->slug }}" class="group">
              <div class="relative max-w-xs lg:min-w-[200px] md:min-w-[100px] bg-white rounded-lg mx-1 my-3 cursor-pointer">
                <div class="w-full overflow-hidden shadow-md rounded-lg bg-white">
                  <img class="h-20 md:h-52 w-full object-contain object-center group-hover:opacity-75" src="{{ $product->image }}">
                </div>
                <div class="mt-4 pl-2 mb-2 justify-between ">
                  <div>
                    <p class="p-2 font-semibold text-sm text-gray-900 line-clamp-3">{{ $product->name }}</p>
                  </div>
                </div>
              </div>
            </a>
              @endforeach
              @if($products->isEmpty())
              <h3 class="text-center font-semibold text-white text-2xl">-------------------------------------------------</h3>
              @endif
            </div>
          </div> --}}
        </div>
    </div>
  </section>
    @endsection