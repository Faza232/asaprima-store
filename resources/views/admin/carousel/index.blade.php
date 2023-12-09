@extends('layout.admin')
@section('container')


<div class="container overflow-hidden w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Carousel</h1>
  </div>
{{-- d --}}
  {{-- Upload Button --}}
  @if ($count < 4)
    <a href="/dashboard/carousel/create" class="my-4 bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded-lg inline-flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <span class="text-sm">Upload</span>
    </a>
    @else
    <button class="my-4 bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded-lg inline-flex items-center" id="uploadAlert">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <span class="text-sm">Upload</span>
    </button>
  @endif
  {{-- Images --}}
  @if($count > 0)
  <div class="space-y-4 md:space-y-0 md:grid md:grid-cols-2 md:gap-2">
    @foreach ($images as $image)
      <div class="relative">
        <img src="{{ asset($image->image) }}" alt="" class="h-auto max-w-full rounded-md object-cover">
        <button
          class="absolute top-3 right-12 md:right-14 bg-green-500 text-white hover:bg-green-700 text-xs p-[6px] rounded-lg shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
          data-image-id="{{ $image->id }}"
          data-image-link="{{ $image->link }}"
          id="open-btn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
          </svg>          
        </button>
        <form action="{{ route('carousel.destroy', $image->id) }}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button class="absolute top-3 right-3 !bg-red-500 text-white hover:!bg-red-700 text-xs p-[6px] rounded-lg shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 show_confirm">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>              
          </button>
        </form>
      </div>
      @endforeach
  </div>
  <!-- Modal -->
  <div class="fixed hidden inset-0 bg-gray-300 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
    <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
      <div class="mt-3 text-center">
        <form method="POST" action="/dashboard/carousel/{{ $image->id }}">
          @method('put')
          @csrf
          {{-- Link --}}
          <div class="mb-6 max-w-md mx-auto">
            <label for="link" class="block mb-2 text-sm font-medium text-gray-900 text-center">Link</label>
            <input type="text" id="link" name="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('link', $image->link) }}" required>
          </div>
          <button type="submit" class="mx-auto rounded-lg py-2 px-4 !bg-blue-500 hover:!bg-blue-800 text-white">Update Link</button>
        </form>
      </div>
    </div>
  </div>
  @else
  <div class="flex items-center justify-center h-32">
    <p class="text-red-500 text-xl font-semibold">Data tidak ada.</p>
  </div>
  @endif
</div>

@endsection

@section('content-js')

<script>
let modal = document.getElementById("my-modal");
let linkInput = modal.querySelector("#link");

let openButtons = document.querySelectorAll("[data-image-id]");

openButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const imageId = button.getAttribute("data-image-id");
    const imageLink = button.getAttribute("data-image-link");

    linkInput.value = imageLink;
    modal.querySelector("form").action = `/dashboard/carousel/${imageId}`;
    modal.style.display = "block";
  });
});

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

</script>

<script>
    const button = document.getElementById('uploadAlert');
    
    button.addEventListener('click', function(){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Maksimal 4 Gambar Carousel !!'
        });
    });
    </script>
    
    <script>
    $(document).ready(function () {
    $(document).on('click', '.show_confirm', function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
        title: 'Are you sure you want to delete this image?',
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
        })
        .then((willDelete) => {
        if (willDelete.isConfirmed) {
            form.submit();
        }
        });
    });
    });
</script>
@endsection