@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Data Aircraft</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
            <strong>Periksa kembali!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aircrafts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="grid grid-cols-2 gap-6">
            <!-- Bagian Kiri: Data Pesawat -->
            <div class="bg-gray-100 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-4">Data Pesawat</h3>

                <label>Program</label>
                <input type="text" name="program" class="w-full p-2 border rounded" required>

                <label>Tipe Pesawat</label>
                <input type="text" name="aircraft_type" class="w-full p-2 border rounded" required>

                <label>Registrasi</label>
                <input type="text" name="registration" class="w-full p-2 border rounded" required>

                <label>Customer</label>
                <input type="text" name="customer" class="w-full p-2 border rounded" required>

                <label>Upload Gambar</label>
                <input type="file" name="gambar" class="w-full p-2 border rounded">
            </div>

            <!-- Bagian Kanan: Engineering Orders -->
            <div class="bg-gray-100 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-4">Engineering Orders</h3>

                <button type="button" id="open-modal" class="px-4 py-2 bg-green-600 text-white rounded">
                    Tambah Engineering Order
                </button>

                <table class="w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Subject Title</th>
                            <th class="border p-2">Tanggal Mulai</th>
                            <th class="border p-2">Type Order</th> <!-- ✅ Kolom Type Order -->
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="engineering-orders-table"></tbody>
                </table>

                <!-- Container untuk menyimpan input hidden -->
                <div id="engineering-orders-container"></div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </form>
</div>

<!-- MODAL FORM -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h3 class="text-xl font-bold mb-4">Tambah Engineering Order</h3>

        <input type="text" id="engineering_order_no" placeholder="Engineering Order No" class="w-full p-2 border rounded mb-2" required>
        <input type="text" id="subject_title" placeholder="Subject Title" class="w-full p-2 border rounded mb-2" required>
        <input type="date" id="start_date" class="w-full p-2 border rounded mb-2" required>

        <select id="type_order" class="w-full p-2 border rounded mb-2" required>
            <option value="Basic Re-assy and Functional Test">Basic Re-assy and Functional Test</option>
            <option value="Customizing Functional Test">Customizing Functional Test</option>
            <option value="Flight Line">Flight Line</option>
            <option value="Maintenance">Maintenance</option>
            <option value="SB, ASB, AND EASB">SB, ASB, AND EASB</option>
        </select>

        <div class="flex justify-end">
            <button id="close-modal" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</button>
            <button id="save-order" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let orderIndex = 0;
        const modal = document.getElementById("modal");
        const openModalBtn = document.getElementById("open-modal");
        const closeModalBtn = document.getElementById("close-modal");
        const saveOrderBtn = document.getElementById("save-order");
        const tableBody = document.getElementById("engineering-orders-table");
        const ordersContainer = document.getElementById("engineering-orders-container");

        // Fungsi untuk membuka modal
        openModalBtn.addEventListener("click", function () {
            modal.classList.remove("hidden");
        });

        // Fungsi untuk menutup modal
        closeModalBtn.addEventListener("click", function () {
            modal.classList.add("hidden");
            resetModal(); // ✅ Reset form saat modal ditutup
        });

        // Fungsi untuk menyimpan data Engineering Order
        saveOrderBtn.addEventListener("click", function () {
            const orderNo = document.getElementById("engineering_order_no").value;
            const subjectTitle = document.getElementById("subject_title").value;
            const startDate = document.getElementById("start_date").value;
            const typeOrder = document.getElementById("type_order").value;

            if (!orderNo || !subjectTitle || !startDate || !typeOrder) {
                alert("Mohon isi semua data!");
                return;
            }

            // Tambahkan order ke tabel tampilan
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td class="border p-2">${orderIndex + 1}</td>
                <td class="border p-2">${subjectTitle}</td>
                <td class="border p-2">${startDate}</td>
                <td class="border p-2">${typeOrder}</td>
                <td class="border p-2">
                    <button type="button" class="delete-order px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                </td>
            `;
            tableBody.appendChild(newRow);

            // Tambahkan input hidden agar bisa disimpan ke database
            ordersContainer.innerHTML += `
                <input type="hidden" name="engineering_orders[${orderIndex}][engineering_order_no]" value="${orderNo}">
                <input type="hidden" name="engineering_orders[${orderIndex}][subject_title]" value="${subjectTitle}">
                <input type="hidden" name="engineering_orders[${orderIndex}][start_date]" value="${startDate}">
                <input type="hidden" name="engineering_orders[${orderIndex}][type_order]" value="${typeOrder}">
            `;

            orderIndex++;
            modal.classList.add("hidden"); // Tutup modal setelah tambah data
            resetModal(); // ✅ Reset modal setelah menyimpan

            // Tambahkan event listener untuk tombol hapus
            newRow.querySelector(".delete-order").addEventListener("click", function () {
                newRow.remove();
            });
        });

        // Fungsi untuk mereset form dalam modal
        function resetModal() {
            document.getElementById("engineering_order_no").value = "";
            document.getElementById("subject_title").value = "";
            document.getElementById("start_date").value = "";
            document.getElementById("type_order").selectedIndex = 0;
        }
    });
</script>


@endsection
