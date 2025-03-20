@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">Detail Aircraft: {{ $aircraft->program }}</h2>

    <!-- Informasi Pesawat -->
    <div class="bg-white shadow-md rounded-lg p-6 text-sm">
        <h3 class="text-lg font-bold mb-4">Informasi Pesawat</h3>
        <p><strong>Tipe:</strong> {{ $aircraft->aircraft_type }}</p>
        <p><strong>Registrasi:</strong> {{ $aircraft->registration }}</p>
        <p><strong>Customer:</strong> {{ $aircraft->customer }}</p>

        <div class="mt-4">
            <img src="{{ asset('storage/' . $aircraft->image) }}" alt="Gambar Pesawat" class="w-48 h-auto rounded">
        </div>
    </div>

    <!-- Engineering Orders -->
    <div class="bg-white shadow-md rounded-lg p-6 mt-6 text-sm">
        <h3 class="text-lg font-bold mb-4">Engineering Orders</h3>

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
                                    <input type="date" value="{{ $order->start_date }}" 
                                        class="editable border border-gray-300 p-1 w-full text-xs"
                                        data-id="{{ $order->id }}" data-field="start_date">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="date" value="{{ $order->finish_date }}" 
                                        class="editable border border-gray-300 p-1 w-full text-xs"
                                        data-id="{{ $order->id }}" data-field="finish_date">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="text" value="{{ $order->insp_stamp }}" 
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
        <button id="save-all" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
            Simpan Perubahan
        </button>
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
                console.log("Update berhasil:", data);
            }).catch(error => console.log("Error:", error));
        });
    });

    document.querySelectorAll(".delete-order").forEach(button => {
        button.addEventListener("click", function () {
            let orderId = this.dataset.id;

            fetch(`/admin/orders/${orderId}/delete`, {
                method: "POST",
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
            }).then(() => {
                this.closest("tr").remove();
            });
        });
    });

    document.getElementById("save-all").addEventListener("click", function () {
        alert("Perubahan telah disimpan!");
    });
</script>
@endsection
