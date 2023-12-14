@extends('layout.admin')

@section('container')

<div class="container overflow-hidden w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Upload Image</h1>
  </div>

  {{-- Upload Form --}}
  <section class="container w-full mx-auto mt-8">
      <form action="{{ route('carousel.store') }}" enctype="multipart/form-data" method="POST">
          @csrf
          {{-- Image Carousel --}}
          <input id="image" name="image" type="file" class="hidden" accept="image/*">
          <div id="image-preview" class="p-2 md:p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
            <label for="image" class="cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
              </svg>
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
              <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">10mb</b></p>
              <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
              <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
            </label>
          </div>

          {{-- Link --}}
          <div class="mb-6 max-w-md mx-auto">
            <label for="link" class="block mb-2 text-sm font-medium text-gray-900 text-center">Link</label>
            <input type="text" id="link" name="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
          </div>

          {{-- Button --}}
          <div class="flex justify-center space-x-1">
              <a href="{{ route('carousel.index') }}">
                <button type="button" class="mr-1 rounded-lg py-2 px-4 text-sm !bg-slate-500 hover:!bg-slate-800 text-white">Cancel</button>
              </a>
              <button type="submit" class="rounded-lg py-2 px-4 text-sm !bg-blue-500 hover:!bg-blue-800 text-white">Upload</button>
          </div>
      </form>
  </section>
</div>

@endsection

@section('content-js')

<script>
const uploadInput = document.getElementById('image');
const filenameLabel = document.getElementById('filename');
const imagePreview = document.getElementById('image-preview');

// Check if the event listener has been added before
let isEventListenerAdded = false;

uploadInput.addEventListener('change', (event) => {
  const file = event.target.files[0];

  if (file) {
    filenameLabel.textContent = file.name;

    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.innerHTML = `<img src="${e.target.result}" class="max-h-48 w-full lg:max-h-96 object-cover rounded-lg mx-auto" alt="Image preview" />`;
      imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

      // Add event listener for image preview only once
      if (!isEventListenerAdded) {
        imagePreview.addEventListener('click', () => {
          uploadInput.click();
        });

        isEventListenerAdded = true;
      }
    };
    reader.readAsDataURL(file);
  } else {
    filenameLabel.textContent = '';
    imagePreview.innerHTML = `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
    imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

    // Remove the event listener when there's no image
    imagePreview.removeEventListener('click', () => {
      uploadInput.click();
    });

    isEventListenerAdded = false;
  }
});

uploadInput.addEventListener('click', (event) => {
  event.stopPropagation();
});
</script>

@endsection