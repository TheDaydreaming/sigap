<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">QR Code Perangkat</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white p-6 shadow sm:rounded-lg text-center">

<h3 class="font-bold text-lg mb-3">
    {{ $device->nama_pemilik }} — {{ $device->imei }}
</h3>

<div class="mb-4">
{!! QrCode::size(300)
    ->margin(2)
    ->errorCorrection('H')
    ->generate(route('devices.show', $device->id)) !!}
</div>

<p class="text-gray-600 mb-4">
Scan QR ini untuk melihat detail perangkat.
</p>

<a href="/devices/qr" class="text-blue-600">
← Kembali ke daftar
</a>

</div>
</div>
</div>
</x-app-layout>
