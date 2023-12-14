@extends('layout.admin')
@section('container')

<div class="container overflow-hidden w-full rounded-lg bg-white shadow-lg p-4 md:p-6">
  <div class="border-b-2">
    <h1 class="font-semibold text-2xl mb-2">Sertifikat</h1>
  </div>
{{-- d --}}
  {{-- Upload Button --}}
    <a href="/dashboard/certificate/create" class="my-4 bg-blue-500 hover:bg-blue-800 text-white py-2 px-4 rounded-lg inline-flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
      </svg>
      <span class="text-sm">Upload</span>
    </a>
  {{-- Images --}}
  <div class="space-y-4 md:space-y-0 md:grid md:grid-cols-2 md:gap-2">
    @foreach ($certificates as $image)
      <div class="relative">
        <img src="{{ asset($image->image) }}" alt="" class="h-auto max-w-full rounded-md object-cover">
        <a href="{{ route('certificate.edit', $image->id) }}">
        <button
          class="absolute top-3 right-12 md:right-14 bg-green-500 text-white hover:bg-green-700 text-xs p-[6px] rounded-lg shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
          </svg>
        </button>
    </a>
        <form action="{{ route('certificate.destroy', $image->id) }}" method="post">
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
</div>
@endsection

@section('content-js')

<script>
    $(document).ready(function () {
    $(document).on('click', '.show_confirm', function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
        title: 'Are you sure you want to delete this certificates?',
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