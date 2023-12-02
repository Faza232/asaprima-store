@extends('layout.admin')

@section('container')
<div class="px-4 md:px-6 container w-full">
    <div class="border-b-2">
      <h1 class="font-semibold text-2xl mb-2">Category</h1>
    </div>
    <!-- Upload Button -->
    <button class="my-4 bg-main hover:bg-third text-white py-2 px-4 rounded-lg inline-flex items-center"
    data-url="{{ route('category.store') }}"
    id="open-btn">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <span class="text-sm">Create</span>
    </button>  
  
    <!-- Tabel Data -->
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-gray-20 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <button class="toggle-subcategory bg-gray-100 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 rounded"
                        data-collapse-toggle="{{ $category->id }}">
                            +
                        </button>
                    </th>
                    <td class="px-6 py-4">
                        {{$category->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-row space-x-4">
                             {{-- Add subcategory button --}}
                            <button class="flex items-center px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500 hover:text-slate-800" data-category-id2="{{ $category->id }}" data-category-name2="{{ $category->name }}" id="open-btn3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>       
                            <span class="inline">Add subcategory  </span>
                        </button>
                            {{-- Edit Button --}}
                            <button class="flex items-center px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500 hover:text-slate-800"
                                data-category-id="{{ $category->id }}"
                                data-category-name="{{ $category->name }}"
                                id="open-btn2">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                              </svg>       
                              <span class="inline">Edit</span>
                            </button>

                            {{-- Delete Button --}}
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
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
                <tbody id="{{ $category->id }}" class="hidden py-2 space-y-2">
                @foreach($subcategories as $subcategory)
                @if($subcategory->category_id == $category->id)
                <tr>
                    <td>
                    </td>   
                        <td class="px-6 py-4" data-subcategory-id="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-row space-x-4">
                                {{-- Delete Button --}}
                                <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button class="show_confirm flex items-center px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-red-600 hover:text-pink-800" onclick="return confirm('Are you sure?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>  
                                  </button>
                                </form>
                            </div>   
                        </td>
                    </tr>
                @endif
            @endforeach
                </tbody>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    {{-- Update Category Modal --}}
    <div class="fixed inset-0 z-[999] items-center justify-center bg-neutral-100 bg-opacity-75 hidden" id="my-modal2">
        <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <form method="POST">
                    @method('put')
                    @csrf
                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <label for="name2" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <input
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="name2"
                            name="name"
                            placeholder="Name"
                            value="{{ old('name', $category->name ?? '') }}"
                        />
                    </div>
                    <div class="flex justify-center space-x-4">
                        <button type="submit" class="my-4 bg-main hover:bg-third text-white py-2 px-4 rounded-lg inline-flex items-center">Update Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Category Modal --}}
    <div class="fixed inset-0 z-[999] items-center justify-center bg-neutral-100 bg-opacity-75 hidden" id="my-modal">
        <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <form method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type here..." required>
                    </div>
                    <div class="flex justify-center space-x-4">
                        <button type="submit" class="my-4 bg-main hover:bg-third text-white py-2 px-4 rounded-lg inline-flex items-center">Submit Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

        {{-- Add SubCategory Modal --}}
        <div class="fixed inset-0 z-[999] items-center justify-center bg-neutral-100 bg-opacity-75 hidden" id="my-modal3">
            <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <form method="POST" action="{{ route('subcategory.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label id="name3" for="name" class="block mb-2 text-sm font-medium text-gray-900"></label>
                            <input type="text" name="name" id="name4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type here..." required>
                            <input type="text" name="category_id" id="category_id" class="hidden" required>
                        </div>
                        <div class="flex justify-center space-x-4">
                            <button type="submit" class="my-4 bg-main hover:bg-third text-white py-2 px-4 rounded-lg inline-flex items-center">Submit Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

@endsection

@section('content-js')
<script>
    
    let modal3 = document.getElementById("my-modal3");
    let form3 = modal3.querySelector("form");

    // Temukan semua tombol "Edit"
    let AddSubButtons = document.querySelectorAll("[data-category-id2]");

    // Loop melalui setiap tombol "Edit" dan tambahkan event listener
    AddSubButtons.forEach((button) => {
        button.addEventListener("click", function () {
            let categoryId = button.getAttribute("data-category-id2");
            let categoryName = button.getAttribute("data-category-name2");

            // Isi nilai input "Name" dalam modal update dengan nama kategori yang sesuai
            form3.querySelector("#name3").textContent = categoryName;

            form3.querySelector("#category_id").value = categoryId;

            modal3.style.display = "block";
        });
    });

    // Event listener untuk menutup modal saat diklik di luar modal
    window.addEventListener("click", function (event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    });

    // Selainnya, Anda bisa tetap mempertahankan kode untuk menutup modal saat diklik di luar modal
    window.onclick = function (event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }
</script>

<script>
    let modal2 = document.getElementById("my-modal2");
    let form2 = modal2.querySelector("form");

    // Temukan semua tombol "Edit"
    let editButtons = document.querySelectorAll("[data-category-id]");

    // Loop melalui setiap tombol "Edit" dan tambahkan event listener
    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            let categoryId = button.getAttribute("data-category-id");
            let categoryName = button.getAttribute("data-category-name");

            // Isi nilai input "Name" dalam modal update dengan nama kategori yang sesuai
            form2.querySelector("#name2").value = categoryName;

            // Atur action form modal update untuk mengarahkan ke URL yang sesuai dengan ID kategori
            form2.action = `/dashboard/category/${categoryId}`;

            modal2.style.display = "block";
        });
    });

    // Event listener untuk menutup modal saat diklik di luar modal
    window.addEventListener("click", function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    });

    // Selainnya, Anda bisa tetap mempertahankan kode untuk menutup modal saat diklik di luar modal
    window.onclick = function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>

<script>
        let modal = document.getElementById("my-modal");
        let form = modal.querySelector("form");
    
        // Temukan semua tombol "Open Modal"
        let openButtons = document.querySelectorAll("[data-url]");
    
        // Loop melalui setiap tombol "Open Modal" dan tambahkan event listener
        openButtons.forEach((button) => {
        button.addEventListener("click", function () {
            let url = button.getAttribute("data-url");
    
            // Atur action form modal dengan URL yang sesuai
            form.action = url;
            modal.style.display = "block";
        });
        });
    
        // Selainnya, Anda bisa tetap mempertahankan kode untuk menutup modal saat diklik di luar modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>
    
    <script>
    $(document).ready(function () {
      // Menggunakan event delegation untuk menangani klik pada elemen dengan kelas .show_confirm
      $(document).on('click', '.show_confirm', function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: Are you sure you want to delete this category?,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        })
        .then((willDelete) => {
          if (willDelete.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  </script>
    
@endsection