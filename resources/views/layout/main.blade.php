<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partials.links')

</head>
<body>
    @include('layout.nav') <!-- Include the navbar template here -->
    
    <!-- Your page content here -->
    @yield('container')

    <footer>
      @include('layout.footer') 
    <!-- Include the navbar template here -->
    <div class="masx-w-2xlmx-auto">
    </div>  
    </footer>
    
    @include('partials.scripts')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>
</html>
