<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perangkat — SIGAP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body style="background:#E0E2E3;">

<div class="min-h-screen flex items-center justify-center px-4 py-12 fade-in">

<div class="max-w-5xl w-full">

    <!-- GOLD ACCENT -->
    <div class="h-1.5 w-32 mx-auto rounded-full mb-6"
         style="background:#EEBF63;"></div>

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="relative text-center py-10"
             style="background:#07213D;">

            <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10"
                 style="background:#EEBF63; filter: blur(80px);">
            </div>

            <h1 class="text-3xl font-bold tracking-wider text-white relative">
                SIGAP
            </h1>
            <p class="text-sm mt-2 relative"
               style="color:#EEBF63;">
                Sistem Identifikasi dan Pengawasan Handphone
            </p>
        </div>

        <!-- FOTO -->
        <div class="px-8 py-10 grid md:grid-cols-2 gap-12 bg-white">

            <div class="text-center group">
                <p class="text-sm font-semibold mb-4 tracking-wide"
                   style="color:#07213D;">
                    FOTO PEMILIK
                </p>
                <div class="inline-block p-3 rounded-2xl"
                     style="background:#E0E2E3;">
                    <img 
                        src="{{ asset('storage/'.$device->foto_pemilik) }}" 
                        class="rounded-xl w-60 h-60 object-cover shadow-md transition duration-300 group-hover:scale-105"
                    >
                </div>
            </div>

            <div class="text-center group">
                <p class="text-sm font-semibold mb-4 tracking-wide"
                   style="color:#07213D;">
                    FOTO PERANGKAT
                </p>
                <div class="inline-block p-3 rounded-2xl"
                     style="background:#E0E2E3;">
                    <img 
                        src="{{ asset('storage/'.$device->foto_hp) }}" 
                        class="rounded-xl w-60 h-60 object-cover shadow-md transition duration-300 group-hover:scale-105"
                    >
                </div>
            </div>
        </div>

        <!-- ===== DETAIL SECTION REDESIGN ===== -->
        <div class="px-8 pb-12">

            <div class="bg-white border rounded-3xl shadow-lg overflow-hidden"
                 style="border-color:#E0E2E3;">

                <!-- Title -->
                <div class="px-8 py-6 border-b"
                     style="border-color:#E0E2E3;">

                    <h2 class="text-xl font-semibold tracking-wide"
                        style="color:#07213D;">
                        Informasi Perangkat
                    </h2>

                    <div class="h-1 w-14 mt-2 rounded-full"
                         style="background:#EEBF63;"></div>
                </div>

                <!-- Info Grid -->
                <div class="divide-y"
                     style="divide-color:#E0E2E3;">

                    <!-- Row -->
                    <div class="px-8 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <span class="text-sm font-medium"
                              style="color:#07213D; opacity:0.7;">
                            Nama Pemilik
                        </span>
                        <span class="font-semibold text-base"
                              style="color:#07213D;">
                            {{ $device->nama_pemilik }}
                        </span>
                    </div>

                    <div class="px-8 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center"
                         style="background:#FAFAFA;">
                        <span class="text-sm font-medium"
                              style="color:#07213D; opacity:0.7;">
                            IMEI
                        </span>
                        <span class="font-mono text-base px-3 py-1 rounded-lg"
                              style="background:#E0E2E3; color:#07213D;">
                            {{ $device->imei }}
                        </span>
                    </div>

                    <div class="px-8 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center">
                        <span class="text-sm font-medium"
                              style="color:#07213D; opacity:0.7;">
                            Merek HP
                        </span>
                        <span class="font-semibold text-base"
                              style="color:#07213D;">
                            {{ $device->merek_hp }}
                        </span>
                    </div>

                    <div class="px-8 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center"
                         style="background:#FAFAFA;">
                        <span class="text-sm font-medium"
                              style="color:#07213D; opacity:0.7;">
                            Warna HP
                        </span>
                        <span class="font-semibold text-base"
                              style="color:#07213D;">
                            {{ $device->warna_hp }}
                        </span>
                    </div>

                </div>

            </div>

            <!-- INFO TEXT -->
            <div class="mt-10 text-center">
                <p class="text-sm"
                   style="color:#07213D; opacity:0.75;">
                    Data ini ditampilkan melalui sistem <strong>SIGAP</strong>.
                </p>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="text-center py-5 text-xs"
             style="background:#E0E2E3; color:#07213D;">
            © {{ date('Y') }} SIGAP • Inventaris Perangkat
        </div>

    </div>
</div>
</div>

</body>
</html>
