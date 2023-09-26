<!DOCTYPE html>
<html>
<head>
    <!-- Your head content here -->
    @vite('resources/css/app.css')
</head>
<body>
    @include('layout.sidebar') <!-- Include the navbar template here -->
    <div class="container mx-auto">
        <!-- Your page content here -->
        @yield('container')
    </div>
</body>
</html>
