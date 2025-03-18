<header>
    <!-- Header -->
    <div class="bg-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo Kiri -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-16">
            </div>
            <!-- Logo Kanan -->
            <div class="flex">
                <img src="{{ asset('images/heli.png') }}" alt="Company Image" class="h-20">
            </div>
        </div>
    </div>

    <nav class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Tombol Hamburger -->
            <button id="menu-toggle" class="md:hidden text-3xl focus:outline-none transition-transform duration-300">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Menu Navigasi -->
            <div id="menu" class="hidden md:flex md:space-x-6">
               
                
                <a href="{{ route('auth/customer/qms') }}" class="hover:underline">QMS</a>
                <a href="{{ route('auth/customer/project') }}" class="hover:underline">Project</a>
                <a href="{{ route('auth/customer/audit') }}" class="hover:underline">Audit</a>
                <a href="{{ route('auth/customer/info') }}" class="hover:underline">Info</a>
            </div>

            <div class="relative">
                <!-- Tombol Dropdown Desktop -->
                <button id="userDropdownDesktop" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none">
                    <img src="https://via.placeholder.com/30" alt="Profile" class="w-8 h-8 rounded-full">
                    <span>Hi, {{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Menu Dropdown Desktop -->
                <div id="dropdownMenuDesktop" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg hidden">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="fixed inset-0 bg-blue-900 bg-opacity-90 flex flex-col items-center justify-center text-lg transform translate-x-full transition-transform duration-300">
            <button id="close-menu" class="absolute top-6 right-6 text-3xl text-white">
                <i class="fa-solid fa-times"></i>
            </button>

            <div class="flex flex-col space-y-6 text-center">
 
                <a href="{{ route('auth/customer/qms') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">QMS</a>
                <a href="{{ route('auth/customer/project') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Project</a>
                <a href="{{ route('auth/customer/audit') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Audit</a>
                <a href="{{ route('auth/customer/info') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Info</a>
            </div>

            <!-- Tombol Dropdown Mobile -->
            <button id="userDropdownMobile" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none">
                <img src="https://via.placeholder.com/30" alt="Profile" class="w-8 h-8 rounded-full">
                <span>Hi, {{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Menu Dropdown Mobile -->
            <div id="dropdownMenuMobile" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg hidden">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<script>
    // Toggle Dropdown Desktop
    document.getElementById("userDropdownDesktop").addEventListener("click", function(event) {
        event.stopPropagation();
        document.getElementById("dropdownMenuDesktop").classList.toggle("hidden");
    });

    // Toggle Dropdown Mobile
    document.getElementById("userDropdownMobile").addEventListener("click", function(event) {
        event.stopPropagation();
        document.getElementById("dropdownMenuMobile").classList.toggle("hidden");
    });

    // Klik di luar untuk menutup dropdown
    document.addEventListener("click", function(event) {
        let dropdownDesktop = document.getElementById("dropdownMenuDesktop");
        let dropdownMobile = document.getElementById("dropdownMenuMobile");

        // Jika tidak sedang menekan tombol dropdown atau elemen di dalamnya, tutup dropdown
        if (!event.target.closest("#userDropdownDesktop") && !dropdownDesktop.contains(event.target)) {
            dropdownDesktop.classList.add("hidden");
        }

        if (!event.target.closest("#userDropdownMobile") && !dropdownMobile.contains(event.target)) {
            dropdownMobile.classList.add("hidden");
        }
    });

    // Cegah dropdown tertutup saat klik di dalamnya
    document.getElementById("dropdownMenuDesktop").addEventListener("click", function(event) {
        event.stopPropagation();
    });

    document.getElementById("dropdownMenuMobile").addEventListener("click", function(event) {
        event.stopPropagation();
    });

    // Menu Mobile
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const closeMenu = document.getElementById("close-menu");

    menuToggle.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-full");
    });

    closeMenu.addEventListener("click", () => {
        mobileMenu.classList.add("translate-x-full");
    });
</script>

