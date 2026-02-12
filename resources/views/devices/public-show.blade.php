<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Perangkat — SIGAP</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#E0E2E3;">

<div class="min-h-screen flex items-center justify-center px-4 py-10">

<div class="max-w-4xl w-full">

<!-- ====== DECORATIVE ACCENT LINE ====== -->
<div class="h-1 w-24 mx-auto rounded-full mb-4" style="background:#EEBF63;"></div>

<div class="bg-white shadow-xl rounded-3xl overflow-hidden border" style="border-color:#E0E2E3;">

<!-- ====== HEADER ====== -->
<div class="text-white p-7 text-center relative overflow-hidden"
     style="background:#07213D;">

    <!-- soft gold glow -->
    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full opacity-10"
         style="background:#EEBF63; filter: blur(50px);">
    </div>

    <h1 class="text-3xl font-bold tracking-wide relative">
        SIGAP
    </h1>
    <p class="text-sm mt-1 opacity-80 relative">
        Sistem Identifikasi dan Pengawasan Handphone
    </p>
</div>

<!-- ====== FOTO AREA ====== -->
<div class="p-6 md:p-8 grid md:grid-cols-2 gap-8 bg-white">

    <!-- FOTO PEMILIK -->
    <div class="text-center">
        <p class="text-sm font-medium mb-3" style="color:#07213D;">
            Foto Pemilik
        </p>
        <div class="inline-block p-2 rounded-2xl shadow-md"
             style="background:#E0E2E3;">
            <img 
                src="{{ asset('storage/'.$device->foto_pemilik) }}" 
                class="rounded-xl w-56 h-56 object-cover shadow"
            >
        </div>
    </div>

    <!-- FOTO HP -->
    <div class="text-center">
        <p class="text-sm font-medium mb-3" style="color:#07213D;">
            Foto Perangkat
        </p>
        <div class="inline-block p-2 rounded-2xl shadow-md"
             style="background:#E0E2E3;">
            <img 
                src="{{ asset('storage/'.$device->foto_hp) }}" 
                class="rounded-xl w-56 h-56 object-cover shadow"
            >
        </div>
    </div>
</div>

<!-- ====== DETAIL CARD ====== -->
<div class="px-6 md:px-8 pb-8">

<div class="rounded-2xl p-6 border shadow-sm"
     style="background:#E0E2E3; border-color:#E0E2E3;">

    <div class="flex items-center gap-2 mb-4">
        <div class="h-1 w-10 rounded-full" style="background:#EEBF63;"></div>
        <h2 class="text-lg font-semibold" style="color:#07213D;">
            Detail Perangkat
        </h2>
    </div>

    <div class="grid sm:grid-cols-2 gap-3 text-sm" style="color:#07213D;">
        <p>
            <span class="font-semibold">Nama Pemilik:</span><br>
            {{ $device->nama_pemilik }}
        </p>

        <p>
            <span class="font-semibold">IMEI:</span><br>
            {{ $device->imei }}
        </p>

        <p>
            <span class="font-semibold">Merek HP:</span><br>
            {{ $device->merek_hp }}
        </p>

        <p>
            <span class="font-semibold">Warna HP:</span><br>
            {{ $device->warna_hp }}
        </p>
    </div>
</div>

<div class="mt-6 text-center">
    <p class="text-sm" style="color:#07213D; opacity:0.8;">
        Data ini ditampilkan melalui sistem <strong>SIGAP</strong>.
    </p>
</div>

</div>

<!-- ====== FOOTER ====== -->
<div class="text-center p-4 text-xs border-t"
     style="background:#E0E2E3; color:#07213D; border-color:#E0E2E3;">
    © {{ date('Y') }} SIGAP • Inventaris Perangkat
</div>

</div>
</div>
</div>

</body>
</html>
