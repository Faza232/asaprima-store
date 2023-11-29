@extends('layout.admin')

@section('container')

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Create New Product</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/product" enctype="multipart/form-data">
      @csrf
      {{-- Nama Produk --}}
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>

      {{-- Kategori Produk --}}
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
          </select>
        </div>
      </div>
  
      {{-- Slug --}}
      <div class="relative mb-6 hidden" >
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
        <input type="text" id="slug" name="slug" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>

      {{-- Image --}}
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Foto Produk</label>
        <img class="img-preview w-full object-cover md:object-none md:max-h-96 mb-2 rounded-sm">
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file" accept="image/*" name="image" onchange="previewImage()" />
      </div>

      {{-- Description --}}
      <div class="relative mb-6">
        <label for="description" class="mb-2 inline-block text-sm text-neutral-700 font-medium">Description</label>
        <textarea class="full-featured-non-premium" id="description" name="description"></textarea>        
      </div>

      {{-- Button --}}
      <a href="/dashboard/product">
        <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Create Product</button>
  </form>
  </div>
</div>

@endsection

@section('content-js')
    
@vite('public/assets/js/select-cat.js')
@vite('public/assets/js/tinymce.js')

<script>
  
  // Membuat slug otomatis
  const title = document.querySelector('#name');
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

  // Menampilkan preview gambar yang diupload
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
</script>

@endsection