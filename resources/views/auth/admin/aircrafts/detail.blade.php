@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">Detail Aircraft: {{ $aircraft->program }}</h2>

    <!-- Informasi Pesawat -->
    <!-- Informasi Pesawat -->
<div class="bg-white shadow-md rounded-lg p-6 text-sm">
    <h3 class="text-lg font-bold mb-4">Informasi Pesawat</h3>

    <label class="block"><strong>Program:</strong></label>
    <input type="text" value="{{ $aircraft->program }}" 
           class="aircraft-edit border border-gray-300 p-1 w-full text-xs"
           data-id="{{ $aircraft->id }}" data-field="program">

    <label class="block mt-2"><strong>Tipe Pesawat:</strong></label>
    <input type="text" value="{{ $aircraft->aircraft_type }}" 
           class="aircraft-edit border border-gray-300 p-1 w-full text-xs"
           data-id="{{ $aircraft->id }}" data-field="aircraft_type">

    <label class="block mt-2"><strong>Registrasi:</strong></label>
    <input type="text" value="{{ $aircraft->registration }}" 
           class="aircraft-edit border border-gray-300 p-1 w-full text-xs"
           data-id="{{ $aircraft->id }}" data-field="registration">

    <label class="block mt-2"><strong>Customer:</strong></label>
    <input type="text" value="{{ $aircraft->customer }}" 
           class="aircraft-edit border border-gray-300 p-1 w-full text-xs"
           data-id="{{ $aircraft->id }}" data-field="customer">

    <div class="mt-4">
        <img src="{{ asset('storage/' . $aircraft->image) }}" alt="Gambar Pesawat" class="w-48 h-auto rounded">
    </div>
</div>


    <!-- Engineering Orders -->
    <div class="bg-white shadow-md rounded-lg p-6 mt-6 text-sm">
        <h3 class="text-lg font-bold mb-4">Engineering Orders</h3>
        <!-- Tombol Tambah Data -->
<button id="open-modal" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800 mb-4">
    Tambah Data
</button>


        <div class="overflow-auto max-h-[400px] border border-gray-300 p-2">
            @foreach ($orders->groupBy('type_order') as $type => $group)
                <!-- Header Type Order -->
                <h2 class="bg-blue-600 text-white text-md font-bold px-4 py-2">{{ $type }}</h2>
                
                <!-- Tabel -->
                <table class="w-full border-collapse mb-4">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-2 py-1">No</th>
                            <th class="border px-2 py-1">Engineering Order No</th>
                            <th class="border px-2 py-1">Subject Title</th>
                            <th class="border px-2 py-1">Start Date</th>
                            <th class="border px-2 py-1">Finish Date</th>
                            <th class="border px-2 py-1">Insp Stamp</th>
                            <th class="border px-2 py-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group as $index => $order)
    <tr>
        <td class="border px-2 py-1">{{ $index + 1 }}</td>
        <td class="border px-2 py-1">
            <input type="text" value="{{ $order->engineering_order_no }}" 
                class="editable border border-gray-300 p-1 w-full text-xs"
                data-id="{{ $order->id }}" data-field="engineering_order_no">
        </td>
        <td class="border px-2 py-1">
            <input type="text" value="{{ $order->subject_title }}" 
                class="editable border border-gray-300 p-1 w-full text-xs"
                data-id="{{ $order->id }}" data-field="subject_title">
        </td>
        <td class="border px-2 py-1">
            <input type="date" value="{{ $order->start_date ?? '' }}" 
                class="editable border border-gray-300 p-1 w-full text-xs"
                data-id="{{ $order->id }}" data-field="start_date">
        </td>
        <td class="border px-2 py-1">
            <input type="date" value="{{ $order->finish_date ?? '' }}" 
                class="editable border border-gray-300 p-1 w-full text-xs"
                data-id="{{ $order->id }}" data-field="finish_date">
        </td>
        <td class="border px-2 py-1">
            <input type="text" value="{{ $order->insp_stamp ?? '' }}" 
                class="editable border border-gray-300 p-1 w-full text-xs"
                data-id="{{ $order->id }}" data-field="insp_stamp">
        </td>
        <td class="border px-2 py-1">
            <button class="delete-order bg-red-500 text-white px-2 py-1 text-xs rounded" 
                data-id="{{ $order->id }}">Hapus</button>
        </td>
    </tr>
@endforeach

                    </tbody>
                </table>
            @endforeach
        </div>
    </div>

    <!-- Tombol Simpan & Kembali -->
    <div class="flex justify-between mt-6">
        <a href="{{ route('admin.aircrafts.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800">
            Kembali
        </a>
    </div>
</div>
<!-- MODAL FORM -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h3 class="text-xl font-bold mb-4">Tambah Engineering Order</h3>

        <input type="text" id="order_no" placeholder="Engineering Order No" class="w-full p-2 border rounded mb-2" required>
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
            <button id="add-order" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </div>
</div>


<!-- AJAX Update -->
<script>
  document.querySelectorAll(".editable").forEach(input => {
    input.addEventListener("change", function () {
        let orderId = this.dataset.id;
        let field = this.dataset.field;
        let value = this.value;

        fetch(`/admin/orders/${orderId}/update`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ field, value })
        }).then(response => response.json()).then(data => {
            alert("Data berhasil diperbarui!");
            console.log("Update berhasil:", data);
        }).catch(error => console.log("Error:", error));
    });
});

document.querySelectorAll(".delete-order").forEach(button => {
    button.addEventListener("click", function () {
        let orderId = this.dataset.id;
        
        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        fetch(`/admin/orders/${orderId}/delete`, {
            method: "POST",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
        }).then(response => response.json()).then(data => {
            alert("Data berhasil dihapus!");
            this.closest("tr").remove();
        }).catch(error => console.log("Error:", error));
    });
});

document.getElementById("open-modal").addEventListener("click", function () {
    document.getElementById("modal").classList.remove("hidden");
});

document.getElementById("close-modal").addEventListener("click", function () {
    document.getElementById("modal").classList.add("hidden");
});

document.getElementById("add-order").addEventListener("click", function () {
    let orderNo = document.getElementById("order_no").value.trim();
    let subjectTitle = document.getElementById("subject_title").value.trim();
    let startDate = document.getElementById("start_date").value;
    let typeOrder = document.getElementById("type_order").value;
    let aircraftId = "{{ $aircraft->id }}"; // ID Pesawat

    if (!orderNo || !subjectTitle || !startDate || !typeOrder) {
        alert("Semua field harus diisi!");
        return;
    }

    fetch(`/admin/orders/store`, {
        method: "POST",
        headers: { 
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ 
            engineering_order_no: orderNo, 
            subject_title: subjectTitle, 
            start_date: startDate, 
            type_order: typeOrder, 
            aircraft_id: aircraftId 
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Data berhasil ditambahkan!");

            // Tambahkan ke tabel tanpa reload
            let table = document.querySelector(`tbody`);
            let newRow = `
                <tr>
                    <td class="border px-2 py-1">${data.order.id}</td>
                    <td class="border px-2 py-1">${data.order.engineering_order_no}</td>
                    <td class="border px-2 py-1">${data.order.subject_title}</td>
                    <td class="border px-2 py-1">${data.order.start_date}</td>
                    <td class="border px-2 py-1"></td>
                    <td class="border px-2 py-1"></td>
                    <td class="border px-2 py-1">
                        <button class="delete-order bg-red-500 text-white px-2 py-1 text-xs rounded" 
                            data-id="${data.order.id}">Hapus</button>
                    </td>
                </tr>
            `;
            table.insertAdjacentHTML('beforeend', newRow);

            // Reset Form & Tutup Modal
            document.getElementById("order_no").value = "";
            document.getElementById("subject_title").value = "";
            document.getElementById("start_date").value = "";
            document.getElementById("type_order").value = "Basic Re-assy and Functional Test";
            document.getElementById("modal").classList.add("hidden");
        } else {
            alert("Gagal menambahkan data: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan saat menyimpan data.");
    });
});

document.querySelectorAll(".aircraft-edit").forEach(input => {
    input.addEventListener("change", function () {
        let aircraftId = this.dataset.id;
        let field = this.dataset.field;
        let value = this.value.trim();

        fetch(`/admin/aircrafts/${aircraftId}/update`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ field, value })
        })
        .then(response => response.json())
        .then(data => {
            alert("Data berhasil diperbarui!");
        })
        .catch(error => console.log("Error:", error));
    });
});

</script>
@endsection
