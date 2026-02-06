<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Data Perangkat
    </h2>
</x-slot>

<div class="py-12 bg-gray-50">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<!-- CARD WRAPPER -->
<div class="bg-white p-8 shadow-lg rounded-xl border border-gray-100">

<!-- JUDUL SECTION -->
<div class="mb-6">
    <h3 class="text-lg font-semibold text-gray-800">Daftar Perangkat Terdaftar</h3>
    <p class="text-sm text-gray-500">
        Menampilkan seluruh perangkat yang telah diinput ke sistem SIGAP.
    </p>
</div>

<!-- TABLE WRAPPER -->
<div class="overflow-x-auto">
<table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
<thead class="bg-gray-100">
<tr>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nama Pemilik</th>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">IMEI</th>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Merek HP</th>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Warna HP</th>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Foto Pemilik</th>
<th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Foto HP</th>
</tr>
</thead>

<tbody class="divide-y">
@forelse($devices as $d)
<tr class="hover:bg-gray-50 transition">
<td class="px-4 py-3 text-sm text-gray-800">{{ $d->nama_pemilik }}</td>
<td class="px-4 py-3 text-sm text-gray-800 font-mono">{{ $d->imei }}</td>
<td class="px-4 py-3 text-sm text-gray-800">{{ $d->merek_hp }}</td>
<td class="px-4 py-3 text-sm text-gray-800">{{ $d->warna_hp }}</td>

<td class="px-4 py-3">
<img 
src="{{ asset('storage/'.$d->foto_pemilik) }}" 
class="w-20 h-20 object-cover rounded-xl shadow-sm border">
</td>

<td class="px-4 py-3">
<img 
src="{{ asset('storage/'.$d->foto_hp) }}" 
class="w-20 h-20 object-cover rounded-xl shadow-sm border">
</td>
</tr>
@empty
<tr>
<td colspan="6" class="text-center py-8 text-gray-500">
<div class="flex flex-col items-center">
<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
</svg>
Belum ada data perangkat.
</div>
</td>
</tr>
@endforelse
</tbody>
</table>
</div>

</div>
</div>
</div>
</x-app-layout>