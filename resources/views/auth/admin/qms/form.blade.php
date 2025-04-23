@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('components.sidebaradmin')
    
    <!-- Main Content -->
    <div class="flex-1 p-6 overflow-x-auto">
        @include('components.headeradmin')
        @if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded shadow">
        {{ session('success') }}
    </div>
@endif

        <div class="p-6">
            <h2 class="text-2xl font-bold">FORM</h2>
            <a href="{{ route('admin.qms.form.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4">Tambah Form</a>

            <div class="bg-white p-4 shadow rounded-lg">
                <!-- Dropdown Limit -->
                <div class="flex items-center space-x-2 mb-4">
                    <label for="limit" class="text-sm text-gray-700">Tampilkan</label>
                    <select id="limit" class="border p-2 rounded" onchange="changeLimit()">
                        <option value="5" {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request('limit') == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ request('limit') == 20 ? 'selected' : '' }}>20</option>
                        <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>Tampilkan Semua</option>
                    </select>
                    <span class="text-sm text-gray-700">data</span>
                </div>

                <!-- Table Container (Responsive) -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="p-2 border">No</th>
                                <th class="p-2 border">Nomor</th>
                                <th class="p-2 border">Judul</th>
                                <th class="p-2 border">Date Issued</th>
                                <th class="p-2 border">Org</th>
                                <th class="p-2 border">Rev</th>
                                <th class="p-2 border">Amend</th>
                                <th class="p-2 border">Affected Function</th>
                                <th class="p-2 border">File</th>
                                <th class="p-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $index => $form)
                            <tr class="border text-center">
                                <td class="p-2 border">{{ $forms->firstItem() + $index }}</td>
                                <td class="p-2 border">{{ $form->nomor }}</td>
                                <td class="p-2 border">{{ $form->judul }}
                                    <p class="text-blue-600 font-bold">[ {{ $form->type }} ]</p>
                                </td>
                                <td class="p-2 border">{{ $form->date_issued }}</td>
                                <td class="p-2 border">{{ $form->org }}</td>
                                <td class="p-2 border">{{ $form->rev }}</td>
                                <td class="p-2 border">{{ $form->amend }}</td>
                                <td class="p-2 border">{{ $form->affected_function }}</td>
                                <td class="p-2 border">
                                    <a href="{{ Storage::url($form->file_path) }}" class="text-blue-500" target="_blank">Download</a>
                                </td>
                                <td class="p-2 border">
                                    <a href="{{ route('admin.qms.form.edit', $form) }}" class="text-yellow-500">Edit</a>
                                    <!-- Tombol Hapus -->
                                    <button type="button" onclick="openDeleteModal('{{ route('admin.qms.form.destroy', $form) }}')" class="text-red-500 ml-2">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pesan jika kosong -->
                @if($forms->isEmpty())
                    <p class="text-center text-gray-500 mt-4">Tidak ada data.</p>
                @endif

                <!-- Pagination -->
                <div id="pagination" class="mt-4">
                    {{ $forms->appends(['limit' => request('limit')])->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="confirmDeleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-96 text-center">
        <h2 class="text-xl font-bold text-red-600">Konfirmasi Hapus</h2>
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
        <div class="mt-4 flex justify-center space-x-2">
            <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function openDeleteModal(deleteUrl) {
        document.getElementById('deleteForm').setAttribute('action', deleteUrl);
        document.getElementById('confirmDeleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('confirmDeleteModal').classList.add('hidden');
    }

    function changeLimit() {
        let limit = document.getElementById("limit").value;
        window.location.href = `?limit=${limit}`;
    }

    // Sembunyikan pagination jika "Tampilkan Semua" dipilih
    document.addEventListener("DOMContentLoaded", function() {
        let limit = document.getElementById("limit").value;
        if (limit === "all") {
            document.getElementById("pagination").style.display = "none";
        }
    });
</script>
@endsection
