<div class="flex justify-between items-center">
                <div class="relative w-full max-w-lg">
                    <input type="text" placeholder="Cari data yang diinginkan.." class="w-full p-2 rounded border">
                </div>
                <div class="relative">
                    <button id="userDropdown" class="bg-blue-500 text-white p-2 rounded flex items-center space-x-2 focus:outline-none">
                        <span>Hi, {{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
                        <p class="block px-4 py-2 text-gray-700 font-semibold">Role: {{ Auth::user()->role }}</p>
                        <hr class="border-gray-200">
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
                
            </div>

            <script>
                document.getElementById("userDropdown").addEventListener("click", function() {
                    document.getElementById("dropdownMenu").classList.toggle("hidden");
                });
            
                document.addEventListener("click", function(event) {
                    var dropdown = document.getElementById("dropdownMenu");
                    var button = document.getElementById("userDropdown");
            
                    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add("hidden");
                    }
                });
            </script>