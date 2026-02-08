<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Generate QR Code Perangkat
    </h2>
</x-slot>

<div class="py-12 bg-gray-50">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white p-8 shadow-lg rounded-xl">

    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800">
            Daftar Perangkat
        </h3>
        <p class="text-sm text-gray-500">
            Pilih perangkat untuk membuat QR Code.
        </p>
    </div>

    <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-indigo-50">
        <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                Nama Pemilik
            </th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                IMEI
            </th>
            <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">
                Aksi
            </th>
        </tr>
        </thead>

        <tbody class="divide-y">
        @foreach($devices as $d)
        <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3">
                <div class="font-medium text-gray-800">
                    {{ $d->nama_pemilik }}
                </div>
            </td>

            <td class="px-4 py-3 font-mono text-sm text-gray-700">
                {{ $d->imei }}
            </td>

            <td class="px-4 py-3 text-center">
                <a href="{{ route('devices.qr.show', $d->uuid) }}"
                   class="inline-flex items-center gap-2 bg-indigo-600 text-white 
                          px-4 py-2 rounded-lg hover:bg-indigo-700 transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>

                    <span>Buat QR</span>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

</div>
</div>
</div>
</x-app-layout>
