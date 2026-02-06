<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Perangkat — SIGAP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <div class="bg-white shadow-xl rounded-2xl max-w-3xl w-full overflow-hidden">

        <!-- HEADER -->
        <div class="bg-indigo-600 text-white p-6 text-center">
            <h1 class="text-2xl font-bold">SIGAP</h1>
            <p class="text-indigo-100 text-sm mt-1">
                Sistem Identifikasi dan Pengawasan Handphone
            </p>
        </div>

        <div class="p-6 md:p-8 grid md:grid-cols-2 gap-6">

            <!-- FOTO PEMILIK -->
            <div class="text-center">
                <p class="text-gray-500 text-sm mb-2">Foto Pemilik</p>
                <img 
                    src="{{ asset('storage/'.$device->foto_pemilik) }}" 
                    class="mx-auto rounded-xl shadow-md w-56 h-56 object-cover"
                >
            </div>

            <!-- FOTO HP -->
            <div class="text-center">
                <p class="text-gray-500 text-sm mb-2">Foto Perangkat</p>
                <img 
                    src="{{ asset('storage/'.$device->foto_hp) }}" 
                    class="mx-auto rounded-xl shadow-md w-56 h-56 object-cover"
                >
            </div>
        </div>

        <div class="px-6 md:px-8 pb-8">

            <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">
                    Detail Perangkat
                </h2>

                <div class="space-y-2 text-gray-700">
                    <p>
                        <span class="font-semibold">Nama Pemilik:</span>
                        {{ $device->nama_pemilik }}
                    </p>

                    <p>
                        <span class="font-semibold">IMEI:</span>
                        {{ $device->imei }}
                    </p>

                    <p>
                        <span class="font-semibold">Merek HP:</span>
                        {{ $device->merek_hp }}
                    </p>

                    <p>
                        <span class="font-semibold">Warna HP:</span>
                        {{ $device->warna_hp }}
                    </p>
                </div>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Data ini ditampilkan melalui sistem <strong>SIGAP</strong>.
                </p>
            </div>

        </div>

        <div class="bg-gray-100 text-center p-4 text-xs text-gray-500">
            © {{ date('Y') }} SIGAP • Inventaris Perangkat
        </div>

    </div>
</div>

</body>
</html>
