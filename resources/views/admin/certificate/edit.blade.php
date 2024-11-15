@extends('layout.admin')

@section('container')

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Create New Certificate</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/certificate/{{$certificate->id}}" enctype="multipart/form-data">
      @method("PUT")
      @csrf
      {{-- Nama Sertifikat --}}
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Sertifikat</label>
        <input value="{{ old('name', $certificate->name) }}" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>
      {{-- Tahun Aktif --}}
      <div class="mb-6">
        <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Tahun Aktif</label>
        <input value="{{ old('year', $certificate->year) }}" type="text" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>
      {{-- Slug --}}
      <div class="relative mb-6 hidden" >
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
        <input value="{{ old('slug', $certificate->slug) }}" type="text" id="slug" name="slug" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>

      {{-- Image --}}
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Foto Produk</label>
        <input type="hidden" name="oldImage" value="{{ $certificate->image }}">
        @if ($certificate->image)
            <img class="img-preview w-full h-auto object-cover mb-2 rounded-sm" src="{{ asset($certificate->image) }}">
        @else
            <img class="img-preview w-full h-auto object-cover mb-2 rounded-sm">
        @endif
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file" accept="image/*" name="image" onchange="previewImage()" />
      </div>
      @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
      @endif
      {{-- Button --}}
      <a href="/dashboard/certificate" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">
        Cancel
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Create Certificate</button>
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