@extends('layout.main')
@section('container')

<!-- <div class="container mx-auto px-30"> -->
  <!-- Add this in your HTML head -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
<!-- Add this before the closing body tag -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<div class="sm:px-6 lg:px-8 ">
  <div
    id="carouselExampleIndicators"
    class="relative"
    data-te-carousel-init
    data-te-ride="carousel">
    <!--Carousel indicators-->
    <div
      class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
      data-te-carousel-indicators>
      <button
        type="button"
        data-te-target="#carouselExampleIndicators"
        data-te-slide-to="0"
        data-te-carousel-active
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-current="true"
        aria-label="Slide 1"></button>
        @if($count>1)
      <button
        type="button"
        data-te-target="#carouselExampleIndicators"
        data-te-slide-to="1"
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-label="Slide 2"></button>
        @endif
        @if($count>2)
      <button
        type="button"
        data-te-target="#carouselExampleIndicators"
        data-te-slide-to="2"
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-label="Slide 3"></button>
        @endif
        @if($count>3)
        <button
        type="button"
        data-te-target="#carouselExampleIndicators"
        data-te-slide-to="3"
        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
        aria-label="Slide 4"></button>
        @endif
  </div>
    
  <!--Carousel items-->
  <div
    class="relative w-full max-h-[450px] overflow-hidden after:clear-both after:block after:content-['']">
    <!--First item-->
    <div
      class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
      data-te-carousel-item
      data-te-carousel-active>
      <img
        src="{{ $carousels[0]->image }}"
        class="block w-full"
        alt="" />
    </div>
    <!--Second item-->
    @foreach($carousels->skip(1) as $image)
    <div
      class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
      data-te-carousel-item>
      <img
        src="{{ $image->image }}"
        class="block w-full"
        alt="" />
    </div>
    @endforeach
    <!--Third item-->

  </div>
  
  <!--Carousel controls - prev item-->
  <button
    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
    type="button"
    data-te-target="#carouselExampleIndicators"
    data-te-slide="prev">
    <span class="inline-block h-8 w-8">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M15.75 19.5L8.25 12l7.5-7.5" />
      </svg>
    </span>
    <span
      class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
      >Previous</span
    >
  </button>
  <!--Carousel controls - next item-->
  <button
    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
    type="button"
    data-te-target="#carouselExampleIndicators"
    data-te-slide="next">
    <span class="inline-block h-8 w-8">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="h-6 w-6">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
    </span>
    <span
      class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
      >Next</span>
  </button> 
</div>
    
        <div class="sm:px-6 lg:px-8">
            <div class="p-6 max-w-2xl lg:max-w-7xl flex flex-col items-center justify-center mx-auto">
              <h1 class="mb-6 md:mb-8 text-2xl md:text-3xl font-medium text-center text-main">About Us</h1>
              <div data-aos="zoom-in-up" data-aos-delay="70" data-aos-duration="1500" data-aos-mirror="true" class="aos-init aos-animate transition-all duration-500 ease-in-out">
                  <p class="mb-6 text-lg text-center text-gray-600">
                      PT. Asa Prima Niaga merupakan perusahaan yang bergerak di bidang Distributor Alat Kesehatan yang berpusat di Jogja.
                      <div class="border-b-2 border-green-500"></div>

                  </p>
              </div>
              

            </div>

          <div class="">
            <div class="mt-8">
              <h3 class="text-main text-2xl font-medium text-center mt-8">Product Categories</h3>
              <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
                    <div class="z-10 max-w-sm rounded-md h-fit overflow-hidden shadow-lg group sm:max-w-2xl lg:max-w-sm aos-init aos-animate" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" data-aos-mirror="true">
                        <div class="flex items-end justify-end h-40 sm:h-56 w-full bg-cover" style="background-image: url('cart/cat-1.png')">
                        </div>
                        <div class="px-4 py-3 transition duration-300 hover:text-blue-500">
                            <h3 class="text-main text-lg font-medium text-center mt-4 sm:mt-8">Instruments & Orthopedic</h3>
                            <span class="text-gray-500 mt-2"></span>
                        </div>
                    </div>

                  <div class="z-10 max-w-sm rounded-md h-fit overflow-hidden shadow-lg group sm:max-w-2xl lg:max-w-sm aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-mirror="true">
                      <div class="flex items-end justify-end h-40 sm:h-56 w-full bg-cover" style="background-image: url('cart/cat-2.png')">
                      </div>
                      <div class="px-4 py-3 transition duration-300 hover:text-blue-500">
                          <h3 class="text-main text-lg font-medium text-center mt-4 sm:mt-8">Implants</h3>
                          <span class="text-gray-500 mt-2"></span>
                      </div>
                  </div>

                  <div class="z-10 max-w-sm rounded-md h-fit overflow-hidden shadow-lg group sm:max-w-2xl lg:max-w-sm aos-init aos-animate" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000" data-aos-mirror="true">">
                      <div class="flex items-end justify-end h-40 sm:h-56 w-full bg-cover" style="background-image: url('cart/cat-3.jpg')">
                      </div>
                      <div class="px-4 py-3 transition duration-300 hover:text-blue-500">
                          <h3 class="text-main text-lg font-medium text-center mt-4 sm:mt-8">General Instruments Surgical</h3>
                          <span class="text-gray-500 mt-2"></span>
                      </div>
                  </div>
            </div>
      </div>
    

<!-- Testimonials  -->
<div class="sm:px-6 lg:px-8 mx-auto max-w-screen-2xl px-4 py-12">
<div data-aos="flip-left" data-aos-delay="70" data-aos-duration="1500" data-aos-mirror="true" class="aos-init aos-animate transition-all duration-500 ease-in-out">
                  <p class="mb-6 text-lg text-center text-gray-600">
<div class="mb-8 text-center">
    <h3 class="text-main text-2xl font-medium mt-8 bold">Testimonials</h3>
    <div class="mx-auto w-40 border-t-2 border-main mt-2"></div>
    <p class="text-lg text-gray-600">What others say about us</p>
</div>
</div>

<div class=<div class="z-10 max-w-sm rounded-md h-fit overflow-hidden shadow-lg group sm:max-w-2xl lg:max-w-sm aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-mirror="true">
    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 grid-flow-rows gap-4 py-12">
        @foreach ($reviews as $review)
            <div class="p-4 text-gray-800 rounded-lg shadow-md">
                <div class="mb-2">
                    <p class="mb-2 text-center text-gray-600">
                        {{$review->body}}
                    </p>
                    <div class="flex flex-col items-center justify-center">
                        <h5 class="text-main font-normal text-center mt-8">{{$review->name}}</h5>
                        <p class="text-sm text-gray-600 font-normal">Customer</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</div>




@endsection