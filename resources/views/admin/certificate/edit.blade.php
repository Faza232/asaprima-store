@extends('layout.admin')

@section('container')
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="/dashboard/certificate/{{$certificate->id}}" method="POST" enctype="multipart/form-data">
    @method('put')
      @csrf
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Nama Sertifikat
        </label>
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Full Name"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          required
          value="{{ old('name', $certificate->name) }}"
        />
      </div>
      <div class="mb-5">
        <input
          type="hidden"
          name="slug"
          id="slug"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          value="{{ old('slug', $certificate->slug) }}"
        />
      </div>
      <div class="mb-5">
        <label
          for="year"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Tahun Aktif
        </label>
        <input
          type="text"
          name="year"
          id="year"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          required
          value="{{ old('year', $certificate->year) }}"
        />
      </div>
      <div class="col-span-full">
        <label
          for="image"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >Cover Photo
        </label>
          <div class="relative mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
            <svg type="hidden" id="upload-icon" class="z-10 mx-auto h-12 w-12 text-gray-300 hidden-logo" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
            </svg>

            <div class="mb-3 z-20">
                <input type="hidden" name="oldImage" value="{{ $certificate->image }}">
                @if ($certificate->image)
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset($certificate->image) }}">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
            Submit
        </button>
    </div>

    </form>
  </div>
</div>
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