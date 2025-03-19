@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
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

    <form action="{{ route('aircrafts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="program" class="block font-medium">Program</label>
            <input type="text" name="program" id="program" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="aircraft_type" class="block font-medium">Tipe Pesawat</label>
            <input type="text" name="aircraft_type" id="aircraft_type" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="registration" class="block font-medium">Registrasi</label>
            <input type="text" name="registration" id="registration" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="customer" class="block font-medium">Customer</label>
            <input type="text" name="customer" id="customer" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label for="gambar" class="block font-medium">Upload Gambar</label>
            <input type="file" name="gambar" id="gambar" class="w-full p-2 border rounded">
        </div>

        <h3 class="text-xl font-bold mt-6">Engineering Orders</h3>
        <div id="engineering-orders-container">
            <div class="engineering-order space-y-2 border p-4 rounded bg-gray-100">
                <input type="text" name="engineering_orders[0][engineering_order_no]" placeholder="Engineering Order No" class="w-full p-2 border rounded" required>
                <input type="text" name="engineering_orders[0][subject_title]" placeholder="Subject Title" class="w-full p-2 border rounded" required>
                <input type="date" name="engineering_orders[0][start_date]" class="w-full p-2 border rounded" required>
               
                <select name="engineering_orders[0][type_order]" class="w-full p-2 border rounded" required>
                    <option value="Basic Re-assy and Functional Test">Basic Re-assy and Functional Test</option>
                    <option value="Customizing Functional Test">Customizing Functional Test</option>
                    <option value="Flight Line">Flight Line</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="SB, ASB, AND EASB">SB, ASB, AND EASB</option>
                </select>
                
                <button type="button" class="remove-order px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
            </div>
        </div>

        <button type="button" id="add-order" class="px-4 py-2 bg-green-600 text-white rounded">Tambah Engineering Order</button>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let orderIndex = 1;

        document.getElementById("add-order").addEventListener("click", function () {
            let container = document.getElementById("engineering-orders-container");
            let newOrder = document.createElement("div");
            newOrder.classList.add("engineering-order", "space-y-2", "border", "p-4", "rounded", "bg-gray-100");
            newOrder.innerHTML = `
                <input type="text" name="engineering_orders[${orderIndex}][engineering_order_no]" placeholder="Engineering Order No" class="w-full p-2 border rounded" required>
                <input type="text" name="engineering_orders[${orderIndex}][subject_title]" placeholder="Subject Title" class="w-full p-2 border rounded" required>
                <input type="date" name="engineering_orders[${orderIndex}][start_date]" class="w-full p-2 border rounded" required>
                <input type="date" name="engineering_orders[${orderIndex}][finish_date]" class="w-full p-2 border rounded" required>
                <input type="text" name="engineering_orders[${orderIndex}][type_order]" placeholder="Type Order" class="w-full p-2 border rounded" required>
                <input type="text" name="engineering_orders[${orderIndex}][insp_stamp]" placeholder="Inspection Stamp" class="w-full p-2 border rounded" required>
                <button type="button" class="remove-order px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
            `;
            container.appendChild(newOrder);
            orderIndex++;
        });

        document.getElementById("engineering-orders-container").addEventListener("click", function (e) {
            if (e.target.classList.contains("remove-order")) {
                e.target.parentElement.remove();
            }
        });
    });
</script>
@endsection
