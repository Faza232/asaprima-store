@extends('layout.main')
@section('container')    
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="flex items-center justify-center p-8 mx-auto w-full max-w-[550px] container mx-auto px-40">
    
    <!-- drop down -->
      <div class="mb-20 flex justify-center space-x-4">
          <div class="relative group">
              <select id="selectElement1" class="block w-48 px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none ring-1 ring-black ring-opacity-5 bg-blue-500 text-white">
                  <option value="" disabled selected>Kategori</option>
                  <option value="Uppercase">Uppercase</option>
                  <option value="Lowercase">Lowercase</option>
                  <option value="Camel Case">Camel Case</option>
                  <option value="Kebab Case">Kebab Case</option>
              </select>
          </div>
          <!-- <input id="searchInput" class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none" type="text" placeholder="Search items" autocomplete="off"> -->
          <div class="relative group">
            <select id="selectElement" class="block w-48 px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none ring-1 ring-black ring-opacity-5 bg-blue-500 text-white">
                <option value="" disabled selected>Sub Kategori</option>
                <option value="Option 1">Option 1</option>
                <option value="Option 2">Option 2</option>
                <option value="Option 3">Option 3</option>
                <option value="Option 4">Option 4</option>
            </select>
          </div>
      </div>
      </div> 
      <div class ="mx-auto px-40">
        <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl ">
            <a href="#">
                <img src="https://images.unsplash.com/photo-1593491034932-844ab981ed7c?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                <div class="px-4 py-3 w-72">
                    <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                    <p class="text-lg font-bold text-black truncate block capitalize">Product Name</p>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                        <del>
                            <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                        </del>
                        <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg></div>
                    </div>
                </div>
            </a>
        </div>
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