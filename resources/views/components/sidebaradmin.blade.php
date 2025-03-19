<aside class="w-64 bg-gradient-to-b from-blue-900 to-blue-700 p-5 text-white">
    <h1 class="text-xl font-bold">Admin</h1>
    <nav class="mt-6">
        <ul>
            <!-- Tentang Dashboard -->
            <li class="mb-2">
                <div class="flex items-center space-x-2">
                    <span>📌</span>
                    <a href="{{ route('auth.admin.dashboard') }}" class="hover:text-gray-300">Tentang Dashboard</a>
                </div>
            </li>

            <!-- QMS/FORM (Dengan Submenu) -->
            <li class="mb-2">
                <div class="flex items-center justify-between cursor-pointer hover:text-gray-300" onclick="toggleMenu('qmsFormMenu')">
                    <div class="flex items-center space-x-2">
                        <span>📂</span>
                        <span>QMS</span>
                    </div>
                    <span id="qmsFormMenuArrow">🔽</span>
                </div>
                <ul id="qmsFormMenu" class="ml-6 mt-2 hidden">
                    <li class="mb-2 flex items-center space-x-2">
                        <span>📄</span>
                        <a href="{{ route('admin.qms.form') }}" class="hover:text-gray-300">FORM</a>
                    </li>
                </ul>
            </li>

            <!-- Rekap Data -->
            <li class="mb-2">
                <div class="flex items-center space-x-2">
                    <span>📊</span>
                    <a href="{{ route('admin.aircrafts.index') }}" class="hover:text-gray-300">Project Pesawat</a>
                </div>
            </li>

            <!-- Manajemen Akun (Dengan Submenu) -->
            <li class="mb-2">
                <div class="flex items-center justify-between cursor-pointer hover:text-gray-300" onclick="toggleMenu('userMenu')">
                    <div class="flex items-center space-x-2">
                        <span>👤</span>
                        <span>Manajemen Akun</span>
                    </div>
                    <span id="userMenuArrow">🔽</span>
                </div>
                <ul id="userMenu" class="ml-6 mt-2 hidden">
                    <li class="mb-2 flex items-center space-x-2">
                        <span>🛠️</span>
                        <a href="{{ route('admin.users') }}" class="hover:text-gray-300">Kelola Pengguna</a>
                    </li>
                    <li class="mb-2 flex items-center space-x-2">
                        <span>➕</span>
                        <a href="#" class="hover:text-gray-300">Tambah Akun</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>

<script>
    function toggleMenu(menuId) {
        let menu = document.getElementById(menuId);
        let arrow = document.getElementById(menuId + "Arrow");

        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            arrow.innerText = "🔼"; // Ubah ikon ke atas
        } else {
            menu.classList.add("hidden");
            arrow.innerText = "🔽"; // Ubah ikon ke bawah
        }
    }
</script>
