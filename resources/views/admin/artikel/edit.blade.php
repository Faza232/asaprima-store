@extends('layout.admin')

@section('container')
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="/dashboard/produk" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Nama
        </label>
        <input
          type="text"
          name="nama"
          id="nama"
          placeholder="Full Name"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          required
        />
      </div>
      <div class="mb-5">
        <label
          for="slug"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Deskripsi
        </label>
        <input
          type="text"
          name="slug"
          id="slug"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
    <!-- drop down -->
      <div class="flex justify-center space-x-4">
          <div class="relative group">
              <select id="dropdown-menu-1" class="block w-48 px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none ring-1 ring-black ring-opacity-5">
                  <option value="" disabled selected>Kategori</option>
                  <option value="Uppercase">Uppercase</option>
                  <option value="Lowercase">Lowercase</option>
                  <option value="Camel Case">Camel Case</option>
                  <option value="Kebab Case">Kebab Case</option>
              </select>
          </div>
          <div class="relative group">
              <select id="dropdown-menu-2" class="block w-48 px-4 py-2 text-gray-800 border rounded-md border-gray-300 focus:outline-none ring-1 ring-black ring-opacity-5">
                  <option value="" disabled selected>Sub Kategori</option>
                  <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option>
                  <option value="Option 4">Option 4</option>
              </select>
          </div>
      </div>
      
      <div class="col-span-full">
        <label
          for="image"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Cover Photo
        </label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg type="hidden" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                  <input id="image" name="image" type="file" class="sr-only" onchange="previewImage()">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <div class="flex justify-center items-center">
        <button
          type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >
            Update Produk
        </button>
    </div>

    </form>
  </div>
</div>

<!-- Javascript -->
<script>
        // Membuat slug otomatis
        const title = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        title.addEventListener("keyup", function(){
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        // Mematikan fungsi upload file dalam trix editor
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            // ambil data gambar
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

        // JavaScript to toggle the dropdown
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const searchInput = document.getElementById('search-input');
        let isOpen = false; // Set to true to open the dropdown by default
        
        // Function to toggle the dropdown state
        function toggleDropdown() {
          isOpen = !isOpen;
          dropdownMenu.classList.toggle('hidden', !isOpen);
        }
        
        // Set initial state
        toggleDropdown();
        
        dropdownButton.addEventListener('click', () => {
          toggleDropdown();
        });
        
        // Add event listener to filter items based on input
        searchInput.addEventListener('input', () => {
          const searchTerm = searchInput.value.toLowerCase();
          const items = dropdownMenu.querySelectorAll('a');
        
          items.forEach((item) => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
    </script>

@endsection