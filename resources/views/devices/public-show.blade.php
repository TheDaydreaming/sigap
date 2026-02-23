<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perangkat — SIGAP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body style="background:#E6E9ED;">

<div class="min-h-screen flex items-center justify-center px-4 py-10 fade-in">
<div class="max-w-4xl w-full">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- HEADER (COMPACT) -->
        <div class="relative text-center py-7"
             style="background:#07213D;">

            <div class="flex justify-center mb-3">
                <div class="p-2 rounded-xl"
                     style="background:rgba(255,255,255,0.08);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                         fill="none" stroke="#EEBF63" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
            </div>

            <h1 class="text-2xl font-bold tracking-wide text-white">
                SIGAP
            </h1>

            <p class="text-xs mt-1"
               style="color:#EEBF63;">
                Sistem Identifikasi & Pengawasan Aset Perangkat
            </p>
        </div>

        <!-- FOTO SECTION -->
        <div class="px-8 py-10 grid md:grid-cols-2 gap-10">

            <div class="text-center group">
                <p class="text-xs font-semibold mb-3 tracking-wide uppercase"
                   style="color:#07213D;">
                    Foto Pemilik
                </p>
                <div class="inline-block p-2 rounded-2xl transition duration-300 group-hover:shadow-lg"
                     style="background:#F4F6F9;">
                    <img 
                        src="{{ asset('storage/'.$device->foto_pemilik) }}" 
                        class="rounded-xl w-56 h-56 object-cover shadow-sm transition duration-300 group-hover:scale-105"
                    >
                </div>
            </div>

            <div class="text-center group">
                <p class="text-xs font-semibold mb-3 tracking-wide uppercase"
                   style="color:#07213D;">
                    Foto Perangkat
                </p>
                <div class="inline-block p-2 rounded-2xl transition duration-300 group-hover:shadow-lg"
                     style="background:#F4F6F9;">
                    <img 
                        src="{{ asset('storage/'.$device->foto_hp) }}" 
                        class="rounded-xl w-56 h-56 object-cover shadow-sm transition duration-300 group-hover:scale-105"
                    >
                </div>
            </div>

        </div>

        <!-- INFORMASI PERANGKAT -->
        <div class="px-8 pb-12">

            <div class="rounded-2xl overflow-hidden border"
                 style="border-color:#E3E6EB;">

                <!-- TITLE -->
                <div class="px-6 py-5 border-b flex items-center gap-3"
                     style="background:#F9FAFB; border-color:#E3E6EB;">

                    <svg width="18" height="18" fill="none"
                         stroke="#EEBF63" stroke-width="2"
                         viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"/>
                        <path d="M12 8h.01"/>
                    </svg>

                    <h2 class="text-base font-semibold tracking-wide"
                        style="color:#07213D;">
                        Informasi Perangkat
                    </h2>
                </div>

                <!-- ROWS -->
                <div class="divide-y" style="divide-color:#EEF1F4;">

                    <!-- Nama -->
                    <div class="px-6 py-5 flex justify-between items-center hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3 text-sm"
                             style="color:#6B7280;">
                            <svg width="18" height="18" fill="none"
                                 stroke="#EEBF63" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M6 20c0-4 3-6 6-6s6 2 6 6"/>
                            </svg>
                            Nama Pemilik
                        </div>

                        <span class="font-semibold text-sm"
                              style="color:#07213D;">
                            {{ $device->nama_pemilik }}
                        </span>
                    </div>

                    <!-- IMEI -->
                    <div class="px-6 py-5 flex justify-between items-center hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3 text-sm"
                             style="color:#6B7280;">
                            <svg width="18" height="18" fill="none"
                                 stroke="#EEBF63" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path d="M7 8h10M7 12h10M7 16h6"/>
                            </svg>
                            IMEI 1
                        </div>

                        <span class="font-mono text-sm px-3 py-1 rounded-lg"
                              style="background:#F3F4F6; color:#07213D;">
                            {{ $device->imei }}
                        </span>
                    </div>

                    @if($device->imei2)
                    <!-- IMEI 2 -->
                    <div class="px-6 py-5 flex justify-between items-center hover:bg-gray-50 transition border-t">
                        <div class="flex items-center gap-3 text-sm"
                             style="color:#6B7280;">
                            <svg width="18" height="18" fill="none"
                                 stroke="#EEBF63" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path d="M7 8h10M7 12h10M7 16h6"/>
                            </svg>
                            IMEI 2
                        </div>

                        <span class="font-mono text-sm px-3 py-1 rounded-lg"
                              style="background:#F3F4F6; color:#07213D;">
                            {{ $device->imei2 }}
                        </span>
                    </div>
                    @endif

                    <!-- Merek -->
                    <div class="px-6 py-5 flex justify-between items-center hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3 text-sm"
                             style="color:#6B7280;">
                            <svg width="18" height="18" fill="none"
                                 stroke="#EEBF63" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <rect x="6" y="2" width="12" height="20" rx="2"/>
                                <circle cx="12" cy="18" r="1"/>
                            </svg>
                            Merek
                        </div>

                        <span class="font-semibold text-sm"
                              style="color:#07213D;">
                            {{ $device->merek_hp }}
                        </span>
                    </div>

                    <!-- Warna -->
                    <div class="px-6 py-5 flex justify-between items-center hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3 text-sm"
                             style="color:#6B7280;">
                            <svg width="18" height="18" fill="none"
                                 stroke="#EEBF63" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path d="M12 3a9 9 0 1 0 9 9c0-1.5-1-2-2-2h-2a2 2 0 0 1-2-2V6a3 3 0 0 0-3-3z"/>
                            </svg>
                            Warna
                        </div>

                        <span class="font-semibold text-sm"
                              style="color:#07213D;">
                            {{ $device->warna_hp }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="text-center py-4 text-xs"
             style="background:#F3F4F6; color:#6B7280;">
            © {{ date('Y') }} SIGAP
        </div>

    </div>
</div>
</div>

</body>
</html>
