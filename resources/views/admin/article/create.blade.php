@extends('layout.admin')

@section('container')

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Create New Post</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/article" enctype="multipart/form-data">
      @csrf
      {{-- Judul --}}
      <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>
  
      {{-- Slug --}}
      <div class="relative mb-6 hidden" >
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
        <input type="text" id="slug" name="slug" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>

      {{-- Image --}}
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Foto Artikel</label>
        <img class="img-preview w-full object-cover md:object-none md:max-h-96 mb-2 rounded-sm">
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file" accept="image/*" name="image" onchange="previewImage()" />
      </div>

      {{-- Body --}}
      <div class="relative mb-6">
        <label for="body" class="mb-2 inline-block text-sm text-neutral-700 font-medium">Body</label>
        <textarea class="full-featured-non-premium" id="body" name="body"></textarea>        
      </div>

      {{-- Status --}}
      <h3 class="mb-5 text-lg font-medium text-gray-900">Status</h3>
      <ul class="mb-6 grid w-full gap-6 md:grid-cols-2">
          <li>
              <input type="radio" id="status-app" name="status" value="1" class="hidden peer" required>
              <label for="status-app" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-main peer-checked:text-main hover:text-gray-600 hover:bg-gray-100">                           
                  <div class="block">
                      <div class="w-full text-lg font-semibold">Publish</div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ms-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>                  
              </label>
          </li>
          <li>
              <input type="radio" id="status-not" name="status" value="0" class="hidden peer">
              <label for="status-not" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100">
                  <div class="block">
                      <div class="w-full text-lg font-semibold">Don't Publish</div>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ms-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>                  
              </label>
          </li>
      </ul>

      {{-- Button --}}
      <a href="/dashboard/article">
        <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Create Post</button>
  </form>
  </div>
</div>

@endsection

@section('content-js')

@vite('public/assets/js/tinymce.js')

<script>
  // Membuat slug otomatis
  const title = document.querySelector('#title');
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
</script>
    
@endsection