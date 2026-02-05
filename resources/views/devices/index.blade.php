<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Data Perangkat</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white p-6 shadow sm:rounded-lg">

<table class="w-full border">
<thead>
<tr class="bg-gray-100">
<th class="border p-2">Nama Pemilik</th>
<th class="border p-2">IMEI</th>
<th class="border p-2">Merek HP</th>
<th class="border p-2">Warna HP</th>
<th class="border p-2">Foto Pemilik</th>
<th class="border p-2">Foto HP</th>
</tr>
</thead>
<tbody>
@foreach($devices as $d)
<tr>
<td class="border p-2">{{ $d->nama_pemilik }}</td>
<td class="border p-2">{{ $d->imei }}</td>
<td class="border p-2">{{ $d->merek_hp }}</td>
<td class="border p-2">{{ $d->warna_hp }}</td>
<td class="border p-2">
<img src="{{ asset('storage/'.$d->foto_pemilik) }}" width="80">
</td>
<td class="border p-2">
<img src="{{ asset('storage/'.$d->foto_hp) }}" width="80">
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>
</div>
</x-app-layout>
