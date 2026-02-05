<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Detail Perangkat</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white p-6 shadow sm:rounded-lg">

<h3 class="font-bold text-lg mb-3">
    {{ $device->nama_pemilik }}
</h3>

<p><strong>IMEI:</strong> {{ $device->imei }}</p>
<p><strong>Merek:</strong> {{ $device->merek_hp }}</p>
<p><strong>Warna:</strong> {{ $device->warna_hp }}</p>

<div class="mt-4">
    <img src="{{ asset('storage/'.$device->foto_pemilik) }}" width="150">
    <img src="{{ asset('storage/'.$device->foto_hp) }}" width="150">
</div>

</div>
</div>
</div>
</x-app-layout>
