@extends('layout.admin')

@section('container')
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form action="/dashboard/ulasan/{{$ulasan->id}}" method="POST">
    @method('put')
      @csrf
      <div class="mb-5">
        <label
          for="nama"
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
          value="{{ old('nama', $ulasan->nama) }}"
          />
      </div>
      <div class="mb-5">
        <label
          for="email"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Email Address
        </label>
        <input
          type="email"
          name="email"
          id="email"
          placeholder="example@domain.com"
          required
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          autocomplete="on"
          value="{{ old('email', $ulasan->email) }}"
        />
      </div>
      <div class="mb-5">
        <label
          for="isi"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Ulasan
        </label>
        <textarea
          rows="4"
          name="isi"
          id="isi"
          placeholder="Type your message"
          required
          class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        >{{ old('isi', $ulasan->isi) }}</textarea>
      </div>
      <div>
        <button
          type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >
          Update Ulasan
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
