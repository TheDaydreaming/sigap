<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Generate QR Code</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white p-6 shadow sm:rounded-lg">

<table class="w-full border">
<thead>
<tr class="bg-gray-100">
<th class="border p-2">Nama Pemilik</th>
<th class="border p-2">IMEI</th>
<th class="border p-2">Aksi</th>
</tr>
</thead>
<tbody>
@foreach($devices as $d)
<tr>
<td class="border p-2">{{ $d->nama_pemilik }}</td>
<td class="border p-2">{{ $d->imei }}</td>
<td class="border p-2">
<a href="{{ route('devices.qr.show', $d->id) }}"
   class="bg-blue-600 text-white px-3 py-1 rounded">
   Buat QR
</a>
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div>
</x-app-layout>
