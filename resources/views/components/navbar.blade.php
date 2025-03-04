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
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('about') }}" class="hover:underline">About Us</a>
                <a href="{{ route('capabilities') }}" class="hover:underline">Capabilities</a>
                <a href="{{ route('certificates') }}" class="hover:underline">Certificates</a>
            </div>

            <!-- Tombol Login & Registrasi -->
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('login') }}" class="bg-white text-blue-700 border-2 border-blue-700 px-4 py-2 rounded-lg font-bold hover:bg-blue-700 hover:text-white transition duration-200">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold border-2 border-white hover:bg-white hover:text-blue-700 transition duration-200">Registrasi</a>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="fixed inset-0 bg-blue-900 bg-opacity-90 flex flex-col items-center justify-center text-lg transform translate-x-full transition-transform duration-300">
            <button id="close-menu" class="absolute top-6 right-6 text-3xl text-white">
                <i class="fa-solid fa-times"></i>
            </button>

            <div class="flex flex-col space-y-6 text-center">
                <a href="{{ route('home') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Home</a>
                <a href="{{ route('about') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">About Us</a>
                <a href="{{ route('capabilities') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Capabilities</a>
                <a href="{{ route('certificates') }}" class="text-white text-2xl font-semibold hover:text-gray-300 transition duration-200">Certificates</a>
            </div>

            <div class="mt-8 flex flex-col space-y-4">
                <a href="{{ route('login') }}" class="bg-white text-blue-700 border-2 border-blue-700 px-6 py-3 rounded-lg font-bold hover:bg-blue-700 hover:text-white transition duration-200">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-700 text-white px-6 py-3 rounded-lg font-bold border-2 border-white hover:bg-white hover:text-blue-700 transition duration-200">Registrasi</a>
            </div>
        </div>
    </nav>
</header>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.remove("translate-x-full");
    });

    document.getElementById("close-menu").addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.add("translate-x-full");
    });
</script>
