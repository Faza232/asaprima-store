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

<div class=" ">
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
    
        <div class="items-center">
            <div class="p-6 max-w-2xl lg:max-w-7xl flex flex-col justify-center mx-auto">
              <h1 class="mb-6 md:mb-8 text-2xl md:text-3xl font-medium text-center text-main">About Us</h1>
              <div data-aos="zoom-in-up" data-aos-delay="70" data-aos-duration="1500" data-aos-mirror="true" class="aos-init aos-animate transition-all duration-500 ease-in-out">
                  <p class="mb-6 text-lg text-center text-gray-600">
                      PT. Asa Prima Niaga merupakan perusahaan yang bergerak di bidang <br> 
                      Distributor Alat Kesehatan yang berpusat di Jogja.
                      <div class="border-b-2 border-green-500"></div>
                  </p>
              </div>
            </div>
        </div>
    
   
        <p class="mb-6 text-lg text-center text-gray-600">
            <div class="mb-8 text-center">
                <h3 class="text-main text-2xl font-medium text-center mt-8">Description</h3>
            <div class="mx-auto w-40 border-t-2 border-main mt-2"></div>
            </div>
        </p>
        
        <div class="relative overflow-hidden bg-color p-4 md:p-12 text-center bg-second" style="min-height: 275px">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 h-full">

        <!-- Section 1 -->
        <div class="col-span-1 md:col-span-1 h-full bg-fixed md:bg-transparent md:hover:bg-opacity-50 transition ease-in-out duration-300" style="background-color: rgb(30, 150, 76)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white text-center mt-4"> <!-- Center the text as well -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </div>
                    <h2 class="mt-4 text-4xl font-bold">
                      <span class="transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:20]'">
                        +<span class="supports-[counter-set]:sr-only">20</span>
                      </span>
                    </h2>
                    <p class="mb-6 text-2xl font-medium">Years Of Experience</p>
                </div>
            </div>
        </div>


        <!-- Section 2 -->
        <div class="col-span-1 md:col-span-1 h-full bg-fixed" style="background-color: rgb(30, 150, 76)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white text-center mt-4"> <!-- Center the text as well -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/> </svg>
                    </div>
                    <h2 class="mt-4 text-4xl font-bold">
                      <span class="transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:100]'">
                        <span class="supports-[counter-set]:sr-only">100</span>%
                      </span>
                    </h2>
                    <p class="mb-6 text-2xl font-medium">Satisfaction</p>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="col-span-1 md:col-span-1 h-full bg-fixed" style="background-color: rgb(30, 150, 76)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white text-center mt-4"> <!-- Center the text as well -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <svg width="45" height="45" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M10 9H8M16 9H14M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.5 14.5C16.5 14.5 15 16.5 12 16.5C9 16.5 7.5 14.5 7.5 14.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                </div>
                <h2 class="mt-4 text-4xl font-bold">
                  <span class="transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:1000]'">
                    <span class="supports-[counter-set]:sr-only">1000</span>+
                  </span>
                </h2>
                <p class="mb-6 text-2xl font-medium">Happy Customers</p>
            </div>
        </div>
        </div>

        <!-- Section 4 -->
        <div class="col-span-1 md:col-span-1 h-full bg-fixed" style="background-color: rgb(30, 150, 76)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white text-center mt-4"> <!-- Center the text as well -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/> </svg>
                </div>
                <h2 class="mt-4 text-4xl font-bold">
                  <span class="transition-[_--num] duration-[3s] ease-out [counter-set:_num_var(--num)] supports-[counter-set]:before:content-[counter(num)]" x-data="{ shown: false }" x-intersect="shown = true" :class="shown && '[--num:50]'">
                    +<span class="supports-[counter-set]:sr-only">50</span>
                  </span>
                </h2>
                <p class="mb-6 text-2xl font-medium">Quality Products</p>
            </div>
        </div>
    </div>
  </div>
</div>




<!-- Testimonials  -->
<div class="mx-auto max-w-screen-2xl px-4 py-12">
  <div data-aos="flip-left" data-aos-delay="70" data-aos-duration="1500" data-aos-mirror="true" class="aos-init aos-animate transition-all duration-500 ease-in-out">
      <p class="mb-6 text-lg text-center text-gray-600">
        <div class="mb-8 text-center">
          <h3 class="text-main text-2xl font-medium mt-8 bold">Testimonials</h3>
          <div class="mx-auto w-40 border-t-2 border-main mt-2"></div>
          <p class="text-lg text-gray-600">What others say about us</p>
          </div>
  </div>
</div>

  <div class=<div class="z-10 max-w-sm rounded-md h-fit overflow-hidden shadow-lg group sm:max-w-2xl lg:max-w-sm aos-init aos-animate" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-mirror="true">
      <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 grid-flow-rows gap-4 py-12">
          @foreach ($reviews as $review)
              <div class="p-4 text-gray-800 rounded-lg shadow-md text-center">
                  <div class="mb-2">
                      <p class="text-center text-gray-600">
                          {!! $review->body !!}
                      </p>
                      <div class="flex flex-col items-center justify-center">
                      <img class="mt-4 w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
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