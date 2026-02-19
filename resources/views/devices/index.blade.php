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

<!-- CONTROL BAR -->
<div class="mb-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h3 class="text-lg font-medium text-[#07213D]">Daftar Perangkat</h3>
        <p class="mt-1 text-sm text-gray-500">Kelola data perangkat yang terdaftar di sistem.</p>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto items-center">
        <!-- SEARCH -->
        <div class="relative w-full sm:w-64">
             <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="text"
                id="searchInput"
                value="{{ request('search') }}"
                class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#07213D] focus:border-[#07213D]"
                placeholder="Cari Nama / IMEI..."
            >
        </div>

        <!-- TAMBAH PERANGKAT -->
        <a href="{{ route('devices.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-[#07213D] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#051a2e] focus:bg-[#051a2e] active:bg-[#051a2e] focus:outline-none focus:ring-2 focus:ring-[#07213D] focus:ring-offset-2 transition ease-in-out duration-150 whitespace-nowrap shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Perangkat
        </a>
    </div>
</div>

<!-- TABLE CARD -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#07213D]">
                <tr>
                    <th scope="col" class="px-6 py-4 rounded-tl-lg">Nama Pemilik</th>
                    <th scope="col" class="px-6 py-4">IMEI</th>
                    <th scope="col" class="px-6 py-4">Merek HP</th>
                    <th scope="col" class="px-6 py-4">Warna HP</th>
                    <th scope="col" class="px-6 py-4 text-center">Foto Pemilik</th>
                    <th scope="col" class="px-6 py-4 text-center">Foto HP</th>
                    <th scope="col" class="px-6 py-4 text-center rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($devices as $d)
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $d->nama_pemilik }}
                    </td>
                    <td class="px-6 py-4 font-mono text-gray-600">
                        {{ $d->imei }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-50 text-[#07213D] border border-indigo-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            {{ $d->merek_hp }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ $d->warna_hp }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="relative w-12 h-12 mx-auto">
                            <img src="{{ asset('storage/'.$d->foto_pemilik) }}" 
                                 class="w-full h-full object-cover rounded-lg shadow-sm border border-gray-200 hover:scale-150 transition-transform duration-300 z-0 hover:z-50 cursor-pointer">
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                         <div class="relative w-12 h-12 mx-auto">
                            <img src="{{ asset('storage/'.$d->foto_hp) }}" 
                                 class="w-full h-full object-cover rounded-lg shadow-sm border border-gray-200 hover:scale-150 transition-transform duration-300 z-0 hover:z-50 cursor-pointer">
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                             <!-- DETAIL -->
                            <button type="button" onclick="openDetailModal('{{ $d->uuid }}')"
                                    class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 transition shadow-sm border border-blue-100" title="Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            
                            <!-- EDIT -->
                            <button type="button" onclick="openEditModal('{{ $d->uuid }}')"
                                    class="p-2 rounded-lg bg-yellow-50 text-yellow-600 hover:bg-yellow-100 hover:text-yellow-700 transition shadow-sm border border-yellow-100" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>

                            <!-- DELETE -->
                            <button type="button" onclick="openDeleteModal('{{ $d->id }}')"
                                    class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition shadow-sm border border-red-100" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-base font-medium">Belum ada data perangkat.</p>
                            <p class="text-sm mt-1">Silakan tambahkan perangkat baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-lg">
        {{ $devices->appends(request()->query())->links() }}
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

<div id="editModal" 
     class="hidden modal-backdrop fixed inset-0 bg-black/40 backdrop-blur-md flex items-center justify-center z-50">

<div class="modal-content bg-white/90 backdrop-blur-xl border border-white/30 shadow-2xl rounded-2xl p-6 w-[600px]">
    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
        <div>
            <h3 class="text-xl font-bold text-[#07213D]">Edit Perangkat</h3>
            <p class="text-sm text-gray-500">Perbarui informasi perangkat yang terdaftar.</p>
        </div>
        <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form id="editForm" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- NAMA PEMILIK -->
            <div>
                <label for="e_nama" class="block text-sm font-semibold text-[#07213D] mb-1">Nama Pemilik</label>
                <input id="e_nama" name="nama_pemilik" type="text"
                       class="w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition shadow-sm"
                       placeholder="Masukkan nama pemilik">
            </div>

            <!-- IMEI -->
            <div>
                <label for="e_imei" class="block text-sm font-semibold text-[#07213D] mb-1">Nomor IMEI</label>
                <input id="e_imei" name="imei" type="text"
                       class="w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition shadow-sm font-mono"
                       placeholder="Contoh: 356...">
            </div>

            <!-- MEREK HP -->
            <div>
                <label for="e_merek" class="block text-sm font-semibold text-[#07213D] mb-1">Merek Perangkat</label>
                <input id="e_merek" name="merek_hp" type="text"
                       class="w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition shadow-sm"
                       placeholder="Contoh: Samsung, Xiaomi...">
            </div>

            <!-- WARNA HP -->
            <div>
                <label for="e_warna" class="block text-sm font-semibold text-[#07213D] mb-1">Warna Perangkat</label>
                <input id="e_warna" name="warna_hp" type="text"
                       class="w-full rounded-xl border-gray-300 focus:border-[#EEBF63] focus:ring focus:ring-[#EEBF63]/20 transition shadow-sm"
                       placeholder="Contoh: Hitam, Biru...">
            </div>
        </div>



        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100 mt-2">
            <button type="button" onclick="closeEditModal()" 
                    class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 transition">
                Batal
            </button>
            <button type="submit"
                    class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-[#07213D] hover:bg-[#051a2e] shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                Simpan Perubahan
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

/* ========== LIVE SEARCH ========== */
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    let timeout = null;

    searchInput.addEventListener("input", function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const url = new URL(window.location.href);
            if (this.value.trim() === "") {
                url.searchParams.delete("search");
            } else {
                url.searchParams.set("search", this.value);
            }
            url.searchParams.set("page", 1);
            window.location.href = url.toString();
        }, 500);
    });

    // Focus input if search param exists
    if (new URLSearchParams(window.location.search).has("search")) {
        searchInput.focus();
        const val = searchInput.value;
        searchInput.value = '';
        searchInput.value = val;
    }
});
</script>

</x-app-layout>
