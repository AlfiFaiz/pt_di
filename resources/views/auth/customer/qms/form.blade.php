@extends('layouts.app')
@include('components.navbarcust')

@section('content')
<div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/hanggar.png') }}');">
    <div class="container mx-auto px-4 md:px-6 lg:px-12 py-12">
        <div class="mt-6 bg-white p-6 shadow rounded-lg">
            <h2 class="text-xl font-bold mb-4">Daftar Form</h2>

            <!-- Pencarian & Filter -->
            <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <input type="text" id="search" class="border p-2 rounded w-full md:w-1/3" placeholder="Cari berdasarkan Nomor atau Judul..." onkeyup="filterTable()">

                <select id="filterType" class="border p-2 rounded w-full md:w-1/4" onchange="filterTable()">
                    <option value="">Semua Tipe</option>
                    <option value="FORM">FORM</option>
                    <option value="MANUAL">MANUAL</option>
                    <option value="PROCEDURE">PROCEDURE</option>
                    <option value="WORK INSTRUCTION">WORK INSTRUCTION</option>
                    <option value="PERSONAL ROSTER">PERSONAL ROSTER</option>
                    <option value="TRAINING">TRAINING</option>
                </select>
                
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse" id="formTable">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forms as $index => $form)
                        <tr class="border text-center">
                            <td class="p-2 border">{{ $forms->firstItem() + $index }}</td>
                            <td class="p-2 border">{{ $form->nomor }}</td>
                            <td class="p-2 border">{{ $form->judul }}
                                <P class="text-blue-600 font-bold"> [ {{ $form->type }} ]</P>
                            </td>
                            <td class="p-2 border">{{ $form->date_issued }}</td>
                            <td class="p-2 border">{{ $form->org }}</td>
                            <td class="p-2 border">{{ $form->rev }}</td>
                            <td class="p-2 border">{{ $form->amend }}</td>
                            <td class="p-2 border">{{ $form->affected_function }}</td>
                            <td class="p-2 border">
                                @if ($form->file_path)
                                <a href="{{ asset('storage/' . $form->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Download</a>
                                @else
                                    <span class="text-gray-500">Tidak ada file</span>
                                @endif
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

            <!-- Dropdown Limit -->
<div class="flex items-center space-x-2">
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

<!-- Pagination -->
<div id="pagination">
    {{ $forms->appends(['limit' => request('limit')])->links() }}
</div>

            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
  function filterTable() {
    let search = document.getElementById("search").value.toLowerCase();
    let filterType = document.getElementById("filterType").value.toLowerCase();
    let table = document.getElementById("formTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let nomor = rows[i].getElementsByTagName("td")[1]?.textContent.toLowerCase() || "";
        let judulCell = rows[i].getElementsByTagName("td")[2]; // Kolom Judul
        let judul = judulCell?.textContent.toLowerCase() || "";

        // Ambil type dari dalam <p> di kolom judul
        let type = judulCell?.querySelector('p')?.textContent.toLowerCase().replace(/\[|\]/g, '').trim() || "";

        let matchesSearch = nomor.includes(search) || judul.includes(search);
        let matchesFilter = filterType === "" || type === filterType;

        rows[i].style.display = matchesSearch && matchesFilter ? "" : "none";
    }
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
