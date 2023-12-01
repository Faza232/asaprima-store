@extends('layout.admin')

@section('container')

<div class="px-4 md:px-6 container w-full">
    <div class="border-b-2">
      <h1 class="font-semibold text-2xl mb-2">Product</h1>
    </div>
    <!-- Upload Button -->
    <a href="/dashboard/product/create" class="my-4 bg-main hover:bg-third text-white py-2 px-4 rounded-lg inline-flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <span class="text-sm">Upload</span>
    </a>
    {{-- Kategori Produk --}}
    <form action="/dashboard/product" method="GET">
        <div class="mb-6 flex flex-row space-x-7">
            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="category_id" name="category_id" class="form-select input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>Pilih Kategori</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="subcategory_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub-Kategori</label>
                <select id="subcategory_id" name="subcategory_id" class="form-select input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>Pilih Sub-Kategori</option>
                    <!-- Add options for subcategories here if needed -->
                </select>
            </div>
        </div>
        <button type="submit">Filter</button>
    </form>
    
    <!-- Tabel Data -->
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sub Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{$product->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$product?->category?->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$product->subcategory->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-row space-x-4">
                            {{-- Edit Button --}}
                            <a href="{{ route('product.edit', $product->id) }}" class="flex items-center px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500 hover:text-slate-800">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                              </svg>                       
                              <span class="inline">Edit</span>
                            </a>
                            {{-- Delete Button --}}
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                              @method('delete')
                              @csrf
                              <button class="show_confirm flex items-center px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-red-600 hover:text-pink-800" onclick="return confirm('Are you sure?')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>  
                                <span class="inline">Delete</span>
                              </button>
                            </form>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('content-js')

@vite('public/assets/js/select-cat.js')
    
@endsection