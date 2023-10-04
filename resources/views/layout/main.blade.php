<!DOCTYPE html>
<html>
<head>
    <!-- Your head content here -->
    @vite('resources/css/app.css')

    <!-- Tailwind Elements -->
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
</head>
<body>
    @include('layout.nav') <!-- Include the navbar template here -->
    <div class="container mx-auto">
        <!-- Your page content here -->
        @yield('container')
    </div>

    <footer>
      @include('layout.footer') 
    <!-- Include the navbar template here -->
    <div class="masx-w-2xlmx-auto">
    </div>  
    </footer>
    
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>
</html>
