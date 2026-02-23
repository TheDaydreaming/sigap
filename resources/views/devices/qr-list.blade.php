<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#07213D] leading-tight">
            {{ __('Generate QR Code Perangkat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- CONTROL BAR -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-lg font-medium text-[#07213D]">Daftar Perangkat</h3>
                    <p class="mt-1 text-sm text-gray-500">Kelola dan unduh QR Code untuk perangkat terdaftar.</p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <!-- SEARCH -->
                    <div class="relative w-full sm:w-64">
                         <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
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

                    <!-- DOWNLOAD ALL -->
                    <a href="{{ route('devices.qr.download-all') }}"
                       class="inline-flex items-center justify-center px-4 py-2 bg-[#07213D] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#051a2e] focus:bg-[#051a2e] active:bg-[#051a2e] focus:outline-none focus:ring-2 focus:ring-[#07213D] focus:ring-offset-2 transition ease-in-out duration-150 whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Semua ZIP
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
                                <th scope="col" class="px-6 py-4 text-center rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($devices as $d)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $d->nama_pemilik }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <span class="px-2 py-0.5 rounded-md bg-[#07213D]/5 text-[#07213D] text-[10px] font-bold uppercase border border-[#07213D]/10 min-w-[48px] text-center">IMEI 1</span>
                                            <span class="font-mono text-xs font-bold text-gray-800">{{ $d->imei }}</span>
                                        </div>
                                        @if($d->imei2)
                                            <div class="flex items-center gap-2">
                                                <span class="px-2 py-0.5 rounded-md bg-[#EEBF63]/10 text-[#a67c2e] text-[10px] font-bold uppercase border border-[#EEBF63]/20 min-w-[48px] text-center">IMEI 2</span>
                                                <span class="font-mono text-xs font-bold text-gray-700">{{ $d->imei2 }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('devices.qr.show', $d->uuid) }}"
                                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-[#07213D] bg-[#EEBF63] hover:bg-[#d4a852] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#EEBF63] transition shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat QR
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-base font-medium">Tidak ada perangkat ditemukan.</p>
                                        <p class="text-sm mt-1">Coba kata kunci lain atau tambahkan perangkat baru.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                @if($devices->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $devices->appends(request()->query())->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
    // LIVE SEARCH LOGIC
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
            // Move cursor to end
            const val = searchInput.value;
            searchInput.value = '';
            searchInput.value = val;
        }
    });
    </script>
</x-app-layout>
