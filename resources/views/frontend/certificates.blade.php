@extends('layout.main')
@section('container')
<div class="flex items-center justify-center">
    <h1 class="text-3xl font-bold">Certificates</h1>
    <h2 class ="text-2xl"></h2>
</div>

<div class="container mx-auto px-40">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



<div class="container mx-auto px-4"> 
                
<head>
  <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>

<section>
<!-- image -->
    <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
      <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
        @foreach($sertifikats as $sertifikat)
        <li>
          <img 
            x-on:click="imageGalleryOpen" 
            src="{{ $sertifikat->image }}" 
            class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[3/4] lg:aspect-[3/4] xl:aspect-[3/4] hover:opacity-80 transition-opacity"
            alt="photo gallery image 01"
          >
        </li>
        @endforeach
      </ul>
    </div>

</section>

</main>
</body>
</div>

@endsection