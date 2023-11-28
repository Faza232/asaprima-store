@extends('layout.admin')

@section('container')

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Edit Post</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/article/{{$article->id}}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      {{-- Judul --}}
      <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{old('title', $article->title)}}">
      </div>
  
      {{-- Slug --}}
      <div class="relative mb-6 hidden" >
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
        <input type="text" id="slug" name="slug" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{old('slug', $article->slug)}}">
      </div>

      {{-- Image --}}
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Foto</label>
        <input type="hidden" name="oldImage" value="{{ $article->image }}">
        @if ($article->image)
          <img class="img-preview w-full object-cover md:object-none md:max-h-96 mb-2 rounded-sm" src="{{ asset($article->image) }}">
        @else
          <img class="img-preview w-full object-cover md:object-none md:max-h-96 mb-2 rounded-sm">
        @endif
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" type="file" accept="image/*" name="image" onchange="previewImage()" />
      </div>

      {{-- Body --}}
      <div class="relative mb-6">
        <label for="body" class="mb-2 inline-block text-sm text-neutral-700 font-medium">Body</label>
        <textarea class="full-featured-non-premium" id="body" name="body">{{ old('body', $article->body) }}</textarea>
      </div>

      {{-- Button --}}
      <a href="/dashboard/article">
        <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Update Post</button>
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