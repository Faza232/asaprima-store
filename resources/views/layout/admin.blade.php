<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partials.links')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    @include('layout.sidebar') <!-- Include the navbar template here -->
    <div class="p-4 sm:ml-40 lg:ml-[244px]">
        <!-- Your page content here -->
        @yield('container')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    @include('partials.scripts')
    @yield('content-js')
    <script>
        // Fungsi untuk menambahkan kelas yang sesuai ke elemen menu sidebar
        function setActiveMenuItem() {
            // Dapatkan URL saat ini
            var currentURL = window.location.pathname;
        
            // Dapatkan semua elemen menu sidebar
            var menuItems = document.querySelectorAll(".sidenav-link");
            var menuItems1 = document.querySelectorAll(".sidenav-icon");
        
            // Loop melalui elemen menu sidebar
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                var menuItem1 = menuItems1[i];
                var menuItemURL = menuItem.getAttribute("href");
        
                // Periksa apakah URL saat ini cocok dengan URL menu
                if (currentURL.includes(menuItemURL)) {
                    // Remove kelas yang akan di replace
                    menuItem1.classList.remove("text-third");
                    // Tambahkan kelas yang sesuai ke elemen menu
                    menuItem.classList.add(
                        "bg-second"
                    );
                    menuItem1.classList.add(
                        "text-main"
                    );
                }
            }
        }
        
        // Panggil fungsi saat dokumen selesai dimuat
        document.addEventListener("DOMContentLoaded", setActiveMenuItem);
      </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

