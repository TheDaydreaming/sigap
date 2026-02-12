<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Data Perangkat
    </h2>
</x-slot>

<style>
/* ========== ANIMASI MODAL ========== */
.modal-backdrop {
    transition: opacity 0.25s ease;
}
.modal-content {
    transform: translateY(10px) scale(0.98);
    transition: all 0.25s ease;
}
.modal-show .modal-content {
    transform: translateY(0) scale(1);
}

/* ========== PAGINATION LEBIH JELAS ========== */
.pagination {
    display: flex;
    gap: 6px;
    align-items: center;
}
.pagination .page-item span,
.pagination .page-item a {
    padding: 8px 12px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    font-weight: 500;
}

/* PAGE AKTIF JELAS BANGET */
.pagination .active span {
    background: #07213D;
    color: white;
    border-color: #07213D;
    box-shadow: 0 0 0 3px rgba(7, 33, 61, 0.2);
    font-weight: 700;
}

/* hover */
.pagination a:hover {
    background: #EEBF63;
    color: #07213D;
    border-color: #EEBF63;
}
</style>

<div class="py-12 bg-gray-50">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<!-- HEADER + SEARCH (ADA TOMBOL CARI) -->
<div class="mb-6 flex justify-between items-center">
    <div>
        <h3 class="text-lg font-semibold text-gray-800">Daftar Perangkat Terdaftar</h3>
    </div>

    <form method="GET" action="{{ route('devices.index') }}" class="flex gap-2">
        <input 
            type="text"
            name="search"
            id="searchInput"
            value="{{ request('search') }}"
            placeholder="Cari nama / IMEI..."
            class="rounded-lg border-gray-300 focus:ring-[#EEBF63]"
        >
        <button class="bg-[#07213D] text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
            Cari
        </button>
    </form>
</div>

<!-- TABLE -->
<div class="overflow-x-auto">
<table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
<thead class="bg-[#07213D] text-white">
<tr>
<th class="px-4 py-3 text-left text-sm font-semibold">Nama Pemilik</th>
<th class="px-4 py-3 text-left text-sm font-semibold">IMEI</th>
<th class="px-4 py-3 text-left text-sm font-semibold">Merek HP</th>
<th class="px-4 py-3 text-left text-sm font-semibold">Warna HP</th>
<th class="px-4 py-3 text-left text-sm font-semibold">Foto Pemilik</th>
<th class="px-4 py-3 text-left text-sm font-semibold">Foto HP</th>
<th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
</tr>
</thead>

<tbody class="divide-y">
@forelse($devices as $d)
<tr class="hover:bg-gray-50 transition">
<td class="px-4 py-3">{{ $d->nama_pemilik }}</td>
<td class="px-4 py-3 font-mono">{{ $d->imei }}</td>
<td class="px-4 py-3">{{ $d->merek_hp }}</td>
<td class="px-4 py-3">{{ $d->warna_hp }}</td>

<td class="px-4 py-3">
<img src="{{ asset('storage/'.$d->foto_pemilik) }}" 
     class="w-16 h-16 object-cover rounded-lg">
</td>

<td class="px-4 py-3">
<img src="{{ asset('storage/'.$d->foto_hp) }}" 
     class="w-16 h-16 object-cover rounded-lg">
</td>

<td class="px-4 py-3 text-center flex justify-center items-center gap-2 relative z-10">

<!-- DETAIL -->
<button type="button" onclick="openDetailModal('{{ $d->uuid }}')"
        class="p-2 rounded-lg bg-[#07213D]/10 hover:bg-[#07213D]/20 transition z-20">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#07213D]">
  <path stroke-linecap="round" stroke-linejoin="round" 
  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178a1.01 1.01 0 0 1 0 .644C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
  <path stroke-linecap="round" stroke-linejoin="round" 
  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>
</button>

<!-- EDIT -->
<button type="button" onclick="openEditModal('{{ $d->uuid }}')"
        class="p-2 rounded-lg bg-[#EEBF63]/20 hover:bg-[#EEBF63]/40 transition z-20">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#7c5a15]">
  <path stroke-linecap="round" stroke-linejoin="round" 
  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l9.932-9.931Z"/>
</svg>
</button>

<!-- DELETE (ICON STYLE SAMA DENGAN DETAIL & EDIT) -->
<button type="button" onclick="openDeleteModal('{{ $d->id }}')"
        class="p-2 rounded-lg bg-red-100 hover:bg-red-200 transition z-20">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
  <path stroke-linecap="round" stroke-linejoin="round"
  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916"/>
</svg>
</button>

</td>
</tr>
@empty
<tr>
<td colspan="7" class="text-center py-8 text-gray-500">
Belum ada data perangkat.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<div class="mt-4">
{{ $devices->appends(request()->query())->links('pagination::tailwind') }}
</div>

</div>
</div>

<!-- =================== MODAL DETAIL (LEBIH KECIL) =================== -->
<div id="detailModal" 
     class="hidden modal-backdrop fixed inset-0 bg-black/40 backdrop-blur-md flex items-center justify-center z-50">

<div class="modal-content bg-white/80 backdrop-blur-lg border border-white/30 shadow-xl rounded-2xl p-5 w-[420px]">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-[#07213D]">Detail Perangkat</h3>
        <button onclick="closeDetailModal()" class="text-gray-500 hover:text-red-500">✖</button>
    </div>

    <div class="space-y-2 text-sm text-gray-700">
        <p><strong>Nama:</strong> <span id="d_nama"></span></p>
        <p><strong>IMEI:</strong> <span id="d_imei"></span></p>
        <p><strong>Merek:</strong> <span id="d_merek"></span></p>
        <p><strong>Warna:</strong> <span id="d_warna"></span></p>
    </div>

    <div class="grid grid-cols-2 gap-3 mt-4">
        <div>
            <p class="text-xs text-gray-500 mb-1">Foto Pemilik</p>
            <img id="d_foto_pemilik" class="w-full rounded-xl shadow">
        </div>
        <div>
            <p class="text-xs text-gray-500 mb-1">Foto HP</p>
            <img id="d_foto_hp" class="w-full rounded-xl shadow">
        </div>
    </div>

    <button onclick="closeDetailModal()" 
            class="mt-5 w-full bg-[#07213D] text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
        Tutup
    </button>
</div>
</div>

<!-- =================== MODAL EDIT =================== -->
<div id="editModal" 
     class="hidden modal-backdrop fixed inset-0 bg-black/40 backdrop-blur-md flex items-center justify-center z-50">

<div class="modal-content bg-white/80 backdrop-blur-lg border border-white/30 shadow-xl rounded-2xl p-6 w-[520px]">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-[#07213D]">Edit Perangkat</h3>
        <button onclick="closeEditModal()" class="text-gray-500 hover:text-red-500">✖</button>
    </div>

    <form id="editForm" method="POST" class="space-y-3">
        @csrf
        @method('PUT')

        <input id="e_nama" name="nama_pemilik" 
               class="w-full border rounded-xl p-2 focus:ring-[#EEBF63]">

        <input id="e_imei" name="imei" 
               class="w-full border rounded-xl p-2 focus:ring-[#EEBF63]">

        <input id="e_merek" name="merek_hp" 
               class="w-full border rounded-xl p-2 focus:ring-[#EEBF63]">

        <input id="e_warna" name="warna_hp" 
               class="w-full border rounded-xl p-2 focus:ring-[#EEBF63]">

        <div class="flex justify-end space-x-2 mt-4">
            <button type="button" onclick="closeEditModal()" 
                    class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300 transition">
                Batal
            </button>
            <button type="submit"
                    class="bg-[#07213D] text-white px-4 py-2 rounded-xl hover:opacity-90 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
</div>

<!-- ============ MODAL KONFIRMASI HAPUS ============ -->
<div id="deleteModal" 
     class="hidden modal-backdrop fixed inset-0 bg-black/40 backdrop-blur-md flex items-center justify-center z-50">

<div class="modal-content bg-white/80 backdrop-blur-lg border border-white/30 shadow-xl rounded-2xl p-6 w-[420px] text-center">
    <h3 class="text-lg font-bold text-red-600">Hapus Perangkat?</h3>
    <p class="text-sm text-gray-600 mt-2">
        Data yang dihapus tidak dapat dikembalikan.
    </p>

    <div class="flex justify-center gap-3 mt-5">
        <button onclick="closeDeleteModal()" 
                class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300 transition">
            Batal
        </button>
        <button id="confirmDeleteBtn"
                class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition">
            Hapus
        </button>
    </div>
</div>
</div>

<!-- ============ TOAST NOTIFICATION ============ -->
<div id="toast"
     class="fixed bottom-6 right-6 translate-y-10 opacity-0 pointer-events-none transition-all duration-300 ease-out z-50">

<div class="bg-white/80 backdrop-blur-lg border border-white/30 shadow-xl rounded-xl px-5 py-4 flex items-center gap-3">

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
  <path stroke-linecap="round" stroke-linejoin="round"
  d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

<div>
  <p class="text-sm font-semibold text-gray-800" id="toast-title">Berhasil</p>
  <p class="text-xs text-gray-600" id="toast-message">Data berhasil dihapus.</p>
</div>

<button onclick="hideToast()" class="text-gray-400 hover:text-red-500 ml-2">✖</button>

</div>
</div>

<script>
function showModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("hidden");
    modal.classList.add("modal-show");
}

function hideModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("modal-show");
    setTimeout(() => modal.classList.add("hidden"), 200);
}

function openDetailModal(uuid) {
    fetch(`/devices/${uuid}/json`)
        .then(r => r.json())
        .then(d => {
            document.getElementById("d_nama").innerText = d.nama_pemilik;
            document.getElementById("d_imei").innerText = d.imei;
            document.getElementById("d_merek").innerText = d.merek_hp;
            document.getElementById("d_warna").innerText = d.warna_hp;
            document.getElementById("d_foto_pemilik").src = "/storage/" + d.foto_pemilik;
            document.getElementById("d_foto_hp").src = "/storage/" + d.foto_hp;
            showModal("detailModal");
        });
}

function closeDetailModal() {
    hideModal("detailModal");
}

function openEditModal(uuid) {
    fetch(`/devices/${uuid}/json`)
        .then(r => r.json())
        .then(d => {
            document.getElementById("e_nama").value = d.nama_pemilik;
            document.getElementById("e_imei").value = d.imei;
            document.getElementById("e_merek").value = d.merek_hp;
            document.getElementById("e_warna").value = d.warna_hp;
            document.getElementById("editForm").action = `/devices/${d.id}`;
            showModal("editModal");
        });
}

function closeEditModal() {
    hideModal("editModal");
}

/* ========== DELETE MODAL ========== */
let deleteId = null;

function openDeleteModal(id) {
    deleteId = id;
    showModal("deleteModal");

    document.getElementById("confirmDeleteBtn").onclick = function() {
        fetch(`/devices/${deleteId}?page={{ request('page', 1) }}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            }
        }).then(() => {
            hideModal("deleteModal");
            showToast("Berhasil", "Data perangkat telah dihapus.");
            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1000);
        });
    };
}

function closeDeleteModal() {
    hideModal("deleteModal");
}

/* ========== TOAST ========== */
function showToast(title, message) {
    const toast = document.getElementById("toast");
    document.getElementById("toast-title").innerText = title;
    document.getElementById("toast-message").innerText = message;

    toast.classList.remove("translate-y-10", "opacity-0", "pointer-events-none");
    toast.classList.add("translate-y-0", "opacity-100");

    setTimeout(hideToast, 3000);
}

function hideToast() {
    const toast = document.getElementById("toast");
    toast.classList.add("translate-y-10", "opacity-0", "pointer-events-none");
}
</script>

</x-app-layout>
