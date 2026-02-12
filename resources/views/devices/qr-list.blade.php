<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl" style="color:#07213D;">
        Generate QR Code Perangkat
    </h2>
</x-slot>

<div class="py-10" style="background:#E0E2E3;">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

<!-- HEADER + SEARCH -->
<div class="p-6 rounded-2xl shadow-sm border flex flex-wrap gap-4 items-center justify-between"
     style="background:#FFFFFF; border-color:#E0E2E3;">

    <div>
        <h3 class="text-lg font-semibold" style="color:#07213D;">
            Daftar Perangkat
        </h3>
        <p class="text-sm mt-1 text-gray-500">
            Cari perangkat atau buat QR Code.
        </p>
    </div>

    <input 
        type="text"
        id="searchInput"
        placeholder="Cari nama / IMEI..."
        value="{{ request('search') }}"
        class="rounded-xl border-gray-300 focus:ring-[#EEBF63]"
    >
</div>

<!-- TABLE -->
<div class="rounded-2xl shadow-sm border overflow-hidden"
     style="background:#FFFFFF; border-color:#E0E2E3;">

<div class="overflow-x-auto">
<table class="min-w-full">
<thead style="background:#07213D;">
<tr>
    <th class="px-6 py-4 text-left text-sm font-semibold text-white">Nama Pemilik</th>
    <th class="px-6 py-4 text-left text-sm font-semibold text-white">IMEI</th>
    <th class="px-6 py-4 text-center text-sm font-semibold text-white">Aksi</th>
</tr>
</thead>

<tbody style="background:#FFFFFF;">
@forelse($devices as $d)
<tr class="hover:bg-gray-50 transition-all duration-150"
    style="border-bottom:1px solid #E0E2E3;">

<td class="px-6 py-4 font-medium" style="color:#07213D;">
    {{ $d->nama_pemilik }}
</td>

<td class="px-6 py-4 font-mono text-sm" style="color:#07213D;">
    {{ $d->imei }}
</td>

<td class="px-6 py-4 text-center">
<a href="{{ route('devices.qr.show', $d->uuid) }}"
   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl transition shadow-sm hover:shadow-md"
   style="background:#07213D; color:#FFFFFF;">
    Buat QR
</a>
</td>
</tr>
@empty
<tr>
<td colspan="3" class="text-center py-10 text-gray-500">
    Tidak ada data ditemukan.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<!-- PAGINATION -->
<div class="px-6 py-4">
{{ $devices->appends(request()->query())->links('pagination::tailwind') }}
</div>

</div>
</div>
</div>

<script>
/* LIVE SEARCH (tetap ada) */
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
    }, 400);
});
</script>

</x-app-layout>
