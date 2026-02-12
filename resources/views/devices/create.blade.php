<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl" style="color:#07213D;">
        Input Data Perangkat
    </h2>
</x-slot>

<div class="py-12" style="background:#E0E2E3;">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="rounded-2xl shadow-xl overflow-hidden" style="background:#FFFFFF; border:1px solid #E0E2E3;">

            <!-- HEADER FORM -->
            <div class="px-8 py-6" style="background:#07213D;">
                <h3 class="text-xl font-bold text-white">
                    Registrasi Perangkat
                </h3>
                <p class="mt-1 text-sm" style="color:#EEBF63;">
                    Pastikan data yang diinput sudah benar dan valid.
                </p>
            </div>

            <form id="deviceForm" action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-8 space-y-6">

                    <!-- ALERT VALIDASI (HIDDEN DEFAULT) -->
                    <div id="validationAlert" class="hidden p-4 rounded-xl border-l-4" style="background:#FFF7E6; border-color:#EEBF63; color:#07213D;">
                        Mohon lengkapi semua data dengan benar sebelum melanjutkan.
                    </div>

                    <!-- SECTION: DATA PEMILIK -->
                    <div>
                        <h4 class="font-semibold mb-3" style="color:#07213D;">
                            Data Pemilik
                        </h4>
                        <div class="h-1 w-16 rounded-full mb-4" style="background:#EEBF63;"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    Nama Pemilik
                                </label>
                                <input 
                                    type="text" 
                                    name="nama_pemilik" 
                                    id="nama_pemilik"
                                    class="w-full rounded-xl border-gray-300 focus:ring-0 focus:border-[#EEBF63] transition"
                                    placeholder="Masukkan nama lengkap"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="namaValid">✓ Valid</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    Foto Pemilik
                                </label>
                                <input 
                                    type="file" 
                                    name="foto_pemilik" 
                                    id="foto_pemilik"
                                    class="w-full rounded-xl border border-gray-300 p-2"
                                    accept="image/*"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="fotoPemilikValid">✓ File dipilih</p>
                            </div>

                        </div>
                    </div>

                    <!-- SECTION: DATA PERANGKAT -->
                    <div>
                        <h4 class="font-semibold mb-3" style="color:#07213D;">
                            Data Perangkat
                        </h4>
                        <div class="h-1 w-16 rounded-full mb-4" style="background:#EEBF63;"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    IMEI
                                </label>
                                <input 
                                    type="text" 
                                    name="imei" 
                                    id="imei"
                                    class="w-full rounded-xl border-gray-300 focus:ring-0 focus:border-[#EEBF63]"
                                    placeholder="Masukkan nomor IMEI"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="imeiValid">✓ Valid</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    Merek HP
                                </label>
                                <input 
                                    type="text" 
                                    name="merek_hp" 
                                    id="merek_hp"
                                    class="w-full rounded-xl border-gray-300 focus:ring-0 focus:border-[#EEBF63]"
                                    placeholder="Contoh: Samsung, Xiaomi, iPhone"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="merekValid">✓ Valid</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    Warna HP
                                </label>
                                <input 
                                    type="text" 
                                    name="warna_hp" 
                                    id="warna_hp"
                                    class="w-full rounded-xl border-gray-300 focus:ring-0 focus:border-[#EEBF63]"
                                    placeholder="Contoh: Hitam, Biru, Putih"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="warnaValid">✓ Valid</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1" style="color:#07213D;">
                                    Foto HP
                                </label>
                                <input 
                                    type="file" 
                                    name="foto_hp" 
                                    id="foto_hp"
                                    class="w-full rounded-xl border border-gray-300 p-2"
                                    accept="image/*"
                                    required>
                                <p class="text-xs mt-1 hidden text-green-600" id="fotoHpValid">✓ File dipilih</p>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- FOOTER BUTTON -->
                <div class="px-8 py-6 flex justify-end gap-4" style="background:#F3F4F6;">

                    <button 
                        type="button"
                        id="confirmBtn"
                        class="px-6 py-3 rounded-xl font-semibold transition"
                        style="background:#07213D; color:#EEBF63;">
                        Simpan Data
                    </button>

                    <button 
                        type="button"
                        id="loadingBtn"
                        class="px-6 py-3 rounded-xl font-semibold hidden flex items-center gap-2"
                        style="background:#07213D; color:#EEBF63;">
                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        Menyimpan...
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>

<!-- MODAL KONFIRMASI (BARU - LEBIH BAGUS) -->
<div id="confirmModal"
    class="fixed inset-0 bg-[#07213D]/60 backdrop-blur-sm flex items-center justify-center hidden z-50 transition-all duration-300">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 transform scale-95 transition-all"
        id="confirmBox">

        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-[#EEBF63]/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#EEBF63]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-[#07213D]">Konfirmasi Penyimpanan</h3>
        </div>

        <p class="text-gray-600 mb-6">
            Pastikan semua data sudah benar sebelum disimpan.
        </p>

        <div class="flex justify-end gap-3">
            <button onclick="closeConfirm()"
                class="px-4 py-2 rounded-lg border border-[#E0E2E3] text-gray-600 hover:bg-gray-100 transition">
                Batal
            </button>

            <button onclick="submitForm()"
                class="px-5 py-2 rounded-lg bg-[#07213D] text-white hover:bg-[#0b2f55] transition shadow">
                Ya, Simpan
            </button>
        </div>
    </div>
</div>

<!-- MODAL SUKSES (BARU - LEBIH CAKEP) -->
@if(session('success'))
<div id="successModal"
    class="fixed inset-0 bg-[#07213D]/60 backdrop-blur-sm flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 text-center transform scale-95 animate-bounce-in">

        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-green-100 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h3 class="text-lg font-bold text-[#07213D] mb-2">
            Data Berhasil Disimpan!
        </h3>

        <p class="text-gray-600 mb-6">
            Perangkat telah terdaftar di sistem.
        </p>

        <button onclick="closeSuccess()"
            class="px-5 py-2 rounded-lg bg-[#EEBF63] text-[#07213D] font-semibold hover:bg-[#e0ae56] transition">
            Oke, Mengerti
        </button>
    </div>
</div>
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {

    const form = document.getElementById("deviceForm");
    const confirmBtn = document.getElementById("confirmBtn");
    const loadingBtn = document.getElementById("loadingBtn");

    const confirmModal = document.getElementById("confirmModal");
    const successModal = document.getElementById("successModal");

    const validationAlert = document.getElementById("validationAlert");

    // FIELD YANG DIVALIDASI
    const fields = [
        "nama_pemilik",
        "imei",
        "merek_hp",
        "warna_hp",
        "foto_pemilik",
        "foto_hp"
    ];

    // ✅ VALIDASI VISUAL (HIJAU = VALID)
    fields.forEach(id => {
        const input = document.getElementById(id);

        input.addEventListener("input", function() {
            if (this.value) {
                this.classList.add("border-green-600");
                this.classList.remove("border-red-600");
            } else {
                this.classList.add("border-red-600");
                this.classList.remove("border-green-600");
            }
        });
    });

    // ✅ TOMBOL SIMPAN -> TAMPILKAN MODAL KONFIRMASI
    confirmBtn.addEventListener("click", function(e) {
        e.preventDefault();

        let valid = true;

        fields.forEach(id => {
            if (!document.getElementById(id).value) {
                valid = false;
            }
        });

        if (!valid) {
            validationAlert.classList.remove("hidden");
            return;
        }

        validationAlert.classList.add("hidden");
        confirmModal.classList.remove("hidden");
    });

    // ✅ TUTUP MODAL KONFIRMASI
    window.closeConfirm = function() {
        confirmModal.classList.add("hidden");
    };

    // ✅ YA, SIMPAN (TAMPIL LOADING)
    window.submitForm = function() {
        confirmModal.classList.add("hidden");
        confirmBtn.classList.add("hidden");
        loadingBtn.classList.remove("hidden");

        setTimeout(() => {
            form.submit();
        }, 800);
    };

    // ✅ TAMPIL MODAL SUKSES JIKA ADA SESSION SUCCESS
    @if(session('success'))
        successModal.classList.remove("hidden");
    @endif

    // ✅ TUTUP MODAL SUKSES
    window.closeSuccess = function() {
        successModal.classList.add("hidden");
    };

});
</script>


</x-app-layout>
