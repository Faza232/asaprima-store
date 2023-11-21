@extends('layout.admin')

@section('container')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
{{-- Tiny --}}
<script src="https://cdn.tiny.cloud/1/wcc4fmgwnc7p3ymks5z66gy6ei5l89y7p6uq6mrs9ezfka3m/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Create New Product</h1>
  </div>
  
  {{-- Form --}}
  <div class="block border max-w-3xl rounded-lg p-6 my-4">
    <form method="POST" action="/dashboard/produk" enctype="multipart/form-data">
      @csrf
      {{-- Nama Produk --}}
      <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
        <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
      </div>

      {{-- Kategori Produk --}}
      <div class="mb-6 flex flex-row space-x-7">
        <div>
          <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
          <select id="kategori_id" name="kategori_id" class="form-select input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="" selected>Pilih Kategori</option>
            @foreach ($kategori as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="subkategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub-Kategori</label>
          <select id="subkategori_id" name="subkategori_id" class="form-select input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
        <label for="deskripsi" class="mb-2 inline-block text-sm text-neutral-700 font-medium">Description</label>
        <textarea class="full-featured-non-premium" id="deskripsi" name="deskripsi"></textarea>        
      </div>

      {{-- Button --}}
      <a href="/dashboard/produk">
        <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
      </a>
      <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Create Product</button>
  </form>
  </div>
</div>

@endsection

@section('content-js')
    
@vite('public/assets/js/tinymce.js')

<script>
  
  $(document).ready(function () {
          $('#kategori_id').select2();
      });
  $(document).ready(function () {
          $('#subkategori_id').select2();
      });

  $(document).ready(function() {
      $('#kategori_id').on('change', function() {
          var kategori_id = $(this).val();
          // console.log(kategori_id);
          if (kategori_id) {
              $.ajax({
                  url: '/subkategori/' + kategori_id,
                  type: 'GET',
                  data: {
                      '_token': '{{ csrf_token() }}'
                  },
                  dataType: 'json',
                  success: function(data) {
                      // console.log(data);
                      if (data) {
                          $('#subkategori_id').empty();
                          $('#subkategori_id').append('<option value="">Pilih Sub-Kategori</option>');
                          $.each(data, function(key, subkategori) {
                              $('select[name="subkategori_id"]').append(
                                  '<option value="' + subkategori.id + '">' +
                                  subkategori.name + '</option>'
                              );
                          });
                      } else {
                          $('#subkategori_id').empty();
                      }
                  }
              });
          } else {
              $('#subkategori').empty();
          }
      });
  });

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