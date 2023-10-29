@extends('layout.main')
@section('container')
<div class="container mx-auto px-40">
<div class="mt-21">
    <h3 class="text-gray-600 text-2xl font-medium text-center mt-8">Product Categories</h3>
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-instruments-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-1.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">Instruments & Orthopedi​</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-implants-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-2.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">Implants</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="link-to-general-instruments-surgical-category.html">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('cart/cat-3.jpg')"></div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">General Instruments Surgical</h3>
                    <span class="text-gray-500 mt-2"></span>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
@endsection