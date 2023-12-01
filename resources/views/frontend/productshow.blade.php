@extends('layout.main')
@section('container')
<!-- component -->
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
<div class="min-w-screen min-h-screen bg-main flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0 flex flex-col items-center">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image">
                </div>
                <!-- Centered button below the image -->
                <button class="bg-main opacity-75 hover:opacity-100 text-white hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> Add to Cart</button>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <h1 class="text-main font-bold uppercase text-2xl mb-5 items-center justify-center" style="margin-top: -20px;">Product Name</h1>

                <div class="mt-10">
                    <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eos, voluptatum dolorum! Laborum blanditiis consequatur, voluptates, sint enim fugiat saepe, dolor fugit, magnam explicabo eaque quas id quo porro dolorum facilis</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection