<!-- component -->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page
<main class="min-h-screen w-full" x-data="layout"> -->
    <!-- header page -->
    <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2" x-data="layout">
        <!-- logo -->
        <div class="flex items-center space-x-2">
            <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
            <div>Logo</div>
        </div>

        <!-- button profile -->
        <div>
            <button type="button" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false"
                class="h-9 w-9 overflow-hidden rounded-full">
                <img src="https://plchldr.co/i/40x40?bg=111111" alt="plchldr.co" />
            </button>
    </header>

    <div class="flex">
        <!-- aside -->
        <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2" style="height: 90.5vh"
            x-show="asideOpen">
            <a href="#" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-home"></i></span>
                <span>Dashboard</span>
            </a>

            <a href="/dashboard/produk" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-cart"></i></span>
                <span>Product</span>
            </a>

            <a href="/dashboard/artikel" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-book-reader"></i></span>
                <span>Artikel</span>
            </a>

            <a href="/dashboard/ulasan" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-heart"></i></span>
                <span>Ulasan</span>
            </a>

            <a href="/dashboard/sertifikat" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-certification"></i></span>
                <span>Sertifikat</span>
            </a>

            <a href="#" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-user"></i></span>
                <span>Profile</span>
            </a>
        </aside>


</main>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>


