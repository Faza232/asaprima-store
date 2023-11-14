@extends('layout.main')
@section('container')    
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->

  <div class="container mx-auto px-40">
  <aside class="fixed top-50 left-10 z-40 w-64 h-screen " aria-label="Sidebar">
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
                          <button type="button" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover-bg-gray-700 pl-11" data-subkategori-id="{{ $subkategori->id }}">{{ $subkategori->name }}</button>
                      </li>
                  @endif              
              @endforeach                           
              </ul>
                @endforeach

            </li>
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64" style="margin-left: -20px;">
  <div class="relative m-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5">
    <div class="p-4 sm:ml-64">
      <div class="relative m-3 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 produk-container">
        <!-- Produk akan dimuat ke sini -->
      </div>
    </div>    
  </div>
  <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
  </div>
<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</div>

<script>
$(document).ready(function() {
    // Menangani klik pada subkategori (button)
    $("button[data-subkategori-id]").on('click', function() {
        var subkategoriId = $(this).data('subkategori-id');

        // Lakukan pemrosesan AJAX untuk mendapatkan produk berdasarkan subkategori yang dipilih
        if (subkategoriId) {
            $.ajax({
                url: '/produk/' + subkategoriId,
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('.produk-container').empty();
                        $.each(data, function(key, produk) {
                            var productHTML = '<div class="relative max-w-xs min-w-[200px] bg-white shadow-md rounded-lg mx-1 my-3 cursor-pointer">' +
                                '<div class="overflow-x-hidden rounded-t-lg relative">' +
                                '<img class="h-40 w-full object-cover" src=' + produk.image + '>' +
                                '</div>' +
                                '<div class="mt-4 pl-2 mb-2 flex justify-between ">' +
                                '<div>' +
                                '<p class="p-2 font-semibold text-sm text-gray-900 mb-0">' + produk.nama + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            $('.produk-container').append(productHTML);
                        });
                    } else {
                        $('.produk-container').empty();
                    }
                }
            });
        } else {
            $('.produk-container').empty();
        }
    });
});

  </script>
  
  
@endsection