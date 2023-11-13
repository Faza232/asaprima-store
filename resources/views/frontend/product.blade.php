@extends('layout.main')
@section('container')    
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->

  <div class="container mx-auto px-40">
  <aside class="w-64" aria-label="Sidebar">
    <h1 class>kategori</h1>
    <div class="px-3 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <!-- Menu Dropdown 1 -->
                @foreach($kategories as $kategori)
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="{{ $kategori->id }}" data-collapse-toggle="{{ $kategori->id }}" >
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $kategori->name }}</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="{{ $kategori->id }}" class="hidden py-2 space-y-2">
                  @foreach($subkategories as $subkategori)
                  @if($subkategori->kategori_id == $kategori->id)
                  <li>
                      <a href="#" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11">{{ $subkategori->name }}</a>
                  </li>
              @endif              
                  @endforeach
              </ul>
                @endforeach

            </li>
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64">
  <div class="relative m-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5">
  <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
      <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
      <div>
        <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
      </div>
    </div>
  </div>
  <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
      <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
      <div>
        <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
      </div>
    </div>
  </div>
  <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
      <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
      <div>
        <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
      </div>
    </div>
  </div>
  <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
      <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
      <div>
        <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
      </div>
    </div>
  </div>
  <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
    <div class="overflow-x-hidden rounded-2xl relative">
      <img class="h-40 rounded-2xl w-full object-cover" src="https://pixahive.com/wp-content/uploads/2020/10/Gym-shoes-153180-pixahive.jpg">
    </div>
    <div class="mt-4 pl-2 mb-2 flex justify-between ">
      <div>
        <p class="text-lg font-semibold text-gray-900 mb-0">Product Name</p>
      </div>
    </div>
  </div>
  
  </div>
  </div>
<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</div>
    



<!-- Javascript -->
<script>
        $(document).ready(function () {
                $('#selectElement').select2();
            });
        $(document).ready(function () {
                $('#selectElement1').select2();
            });

      // Dapatkan elemen-elemen yang diperlukan
      var selectElement = document.getElementById('selectElement');
      var searchInput = document.getElementById('searchInput');

      // Tambahkan event listener untuk input
      searchInput.addEventListener('input', function() {
        var searchText = searchInput.value.toLowerCase();

        for (var i = 0; i < selectElement.options.length; i++) {
          var optionText = selectElement.options[i].text.toLowerCase();

          // Periksa apakah teks yang diinputkan sesuai dengan pilihan
          if (optionText.includes(searchText)) {
            selectElement.options[i].style.display = 'block';
          } else {
            selectElement.options[i].style.display = 'none';
          }
        }
      });
    </script>

@endsection