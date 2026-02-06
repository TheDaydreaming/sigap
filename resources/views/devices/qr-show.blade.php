<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        QR Code Perangkat
    </h2>
</x-slot>

<div class="py-12 bg-gray-50">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white p-8 shadow-lg rounded-xl max-w-2xl mx-auto">

    <!-- HEADER INFO PERANGKAT -->
    <div class="text-center mb-6">
        <h3 class="text-xl font-bold text-gray-800">
            {{ $device->nama_pemilik }}
        </h3>
        <p class="text-gray-500 font-mono text-sm">
            IMEI: {{ $device->imei }}
        </p>
    </div>

    <!-- CARD QR -->
    <div class="bg-gray-50 border rounded-xl p-6 text-center">
        <div class="inline-block bg-white p-4 rounded-lg shadow-sm mb-4">
            {!! QrCode::size(320)
                ->margin(2)
                ->errorCorrection('H')
                ->generate(route('devices.public.show', $device->id)) !!}
        </div>

        <p class="text-gray-600 text-sm">
            Scan QR ini untuk melihat detail perangkat.
        </p>
    </div>

    <!-- ACTION -->
    <div class="mt-6 flex justify-between items-center">
        <a href="/devices/qr"
            class="text-indigo-600 hover:underline text-sm">
            ← Kembali ke daftar
        </a>

        <!-- (Opsional) Kalau nanti mau fitur download -->
        {{-- 
        <a href="{{ route('devices.qr.download', $device->id) }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            Download QR
        </a>
        --}}
    </div>

</div>
</div>
</div>
</x-app-layout>
