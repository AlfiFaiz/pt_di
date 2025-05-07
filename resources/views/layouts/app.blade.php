<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality and Safety</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body class="bg-gray-100">
    <!-- Global Loading Overlay -->
<div id="pageLoader" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center hidden">
    <div class="text-white text-center">
        <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" "> 
            <div class="w-10 h-10 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
        </div>
        <p class=" text-black">Sedang memuat halaman...</p>
    </div>
</div>

    @yield('content')

    <x-footer />
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById("pageLoader");
        const excludedPaths = ['{{ route('login') }}', '{{ route('register') }}'];

        if (excludedPaths.includes(window.location.href)) {
            return;
        }

        // Show loader on link click
        document.querySelectorAll("a[href]").forEach(link => {
            link.addEventListener("click", function (e) {
                const href = link.getAttribute("href");
                if (href && !href.startsWith('#') && !link.hasAttribute('target')) {
                    loader.classList.remove("hidden");
                }
            });
        });

        // Show loader on form submit
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", function () {
                loader.classList.remove("hidden");
            });
        });
    });


        
       
    </script>
    
</body>
</html>
