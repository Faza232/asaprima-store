@extends('layout.main')

@section('container')
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
<div class="container mx-auto">
    <div class="min-w-screen min-h-screen bg-second flex items-center p-5 overflow-hidden relative">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-6 md:p-10 mx-auto text-gray-800 relative md:text-left">

            <!-- Image and button section -->
            <div class="sm:ml-4 flex flex-row items-center justify-between z-20">
                <div class="relative m-3 grid grid-cols-1 lg:grid-cols-2 gap-5 font-semibold">
                    <div class="relative max-w-xs min-w-[200px] bg-white shadow-md rounded-lg mx-1 my-3 cursor-pointer">
                        <div class="overflow-x-hidden rounded-t-lg relative">
                            <img class="h-full w-full object-cover" src="{{ asset($product->image) }}" alt="Product Image">
                        </div>
                    </div>
                    <div class="w-full ">
                
                <div class="mt-4 md:mt-6 overflow-hidden line-clamp-5">
                    <h1 class="text-main font-bold uppercase text-xl md:text-2xl lg:text-3xl mb-4 md:mb-6">{{$product->name}}</h1>
                    <p class="text-sm md:text-base">{!! $product->description !!}</p>
                </div>
                </div>
            </div>

            <!-- Product details section -->
            <!--<div class="w-full md:w-1/2 px-2">-->
            <!--    <h1 class="text-main font-bold uppercase text-xl md:text-2xl lg:text-3xl mb-4 md:mb-6">{{$product->name}}</h1>-->
                
            <!--    <div class="mt-4 md:mt-6 overflow-hidden line-clamp-5">-->
            <!--        <p class="text-sm md:text-base">{!! $product->description !!}</p>-->
            <!--    </div>-->
                
            </div>
        </div>
    </div>
</div>
@endsection
