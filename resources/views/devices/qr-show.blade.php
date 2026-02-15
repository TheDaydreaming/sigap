<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl tracking-wide" style="color:#07213D;">
        QR Code Perangkat
    </h2>
</x-slot>

<!-- WRAPPER UNTUK ANIMASI -->
<div id="page-wrapper"
     class="max-w-6xl mx-auto sm:px-6 lg:px-8 py-10
            opacity-0 translate-y-6 transition-all duration-500 ease-out">

    <!-- ===== BACK BUTTON (OUTSIDE CARD) ===== -->
    <div class="mb-6">
        <a href="{{ route('devices.qr.list') }}"
           id="back-button"
           class="inline-flex items-center gap-2 text-sm font-semibold
                  px-4 py-2 rounded-xl transition-all hover:shadow-md"
           style="background:#07213D; color:#FFFFFF;">

            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                 fill="none" stroke="currentColor" stroke-width="2.5"
                 viewBox="0 0 24 24">
                <polyline points="13 18 7 12 13 6"></polyline>
                <polyline points="19 18 13 12 19 6"></polyline>
            </svg>

            Kembali
        </a>
    </div>

    <!-- ===== MAIN CARD ===== -->
    <div class="bg-white rounded-3xl p-12 flex flex-col md:flex-row items-start gap-12 shadow-sm">

        <!-- LEFT QR -->
        <div class="flex-1 text-center">

            <!-- Label QR -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6
                        text-xs font-semibold uppercase tracking-wider"
                 style="background:#07213D; color:#FFFFFF;">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="none" stroke="#EEBF63" stroke-width="2"
                     viewBox="0 0 24 24">
                    <rect x="3" y="3" width="5" height="5"></rect>
                    <rect x="16" y="3" width="5" height="5"></rect>
                    <rect x="3" y="16" width="5" height="5"></rect>
                    <path d="M16 16h5v5h-5z"></path>
                </svg>

                QR Code
            </div>

            <div id="qr-container"
                 class="inline-block bg-white p-6 rounded-2xl shadow-md
                        transition-all duration-300 hover:scale-[1.04] hover:shadow-xl">

                {!! QrCode::size(280)
                    ->margin(2)
                    ->errorCorrection('H')
                    ->generate(url('/public/devices/' . $device->uuid)) !!}
            </div>

        </div>

        <!-- GOLD DIVIDER -->
        <div class="hidden md:block w-px self-stretch"
             style="background:linear-gradient(to bottom, transparent, rgba(238,191,99,0.5), transparent);">
        </div>

        <!-- RIGHT INFO -->
        <div class="flex-1 w-full mt-8 md:mt-0">

            <!-- Label Info -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6
                        text-xs font-semibold uppercase tracking-wider"
                 style="background:#07213D; color:#FFFFFF;">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="none" stroke="#EEBF63" stroke-width="2"
                     viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-4"></path>
                    <path d="M12 8h.01"></path>
                </svg>

                Info Perangkat
            </div>

            <div class="space-y-6 text-sm">

                <!-- Nama Pemilik -->
                <div class="flex justify-between items-center border-b pb-3"
                     style="border-color:#E0E2E3;">
                    <div class="flex items-center gap-3" style="color:#07213D;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="none" stroke="#EEBF63" stroke-width="2"
                             viewBox="0 0 24 24">
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M5.5 21a6.5 6.5 0 0 1 13 0"></path>
                        </svg>
                        <span class="font-medium">Nama Pemilik</span>
                    </div>
                    <span class="font-semibold" style="color:#07213D;">
                        {{ $device->nama_pemilik }}
                    </span>
                </div>

                <!-- IMEI -->
                <div class="flex justify-between items-center border-b pb-3"
                     style="border-color:#E0E2E3;">
                    <div class="flex items-center gap-3" style="color:#07213D;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="none" stroke="#EEBF63" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M4 9h16M4 15h16M10 3L8 21M16 3l-2 18"></path>
                        </svg>
                        <span class="font-medium">IMEI</span>
                    </div>
                    <span style="color:#07213D;">
                        {{ $device->imei }}
                    </span>
                </div>

                <!-- Merek -->
                <div class="flex justify-between items-center border-b pb-3"
                     style="border-color:#E0E2E3;">
                    <div class="flex items-center gap-3" style="color:#07213D;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="none" stroke="#EEBF63" stroke-width="2"
                             viewBox="0 0 24 24">
                            <rect x="6" y="2" width="12" height="20" rx="2"></rect>
                            <circle cx="12" cy="18" r="1"></circle>
                        </svg>
                        <span class="font-medium">Merek</span>
                    </div>
                    <span style="color:#07213D;">
                        {{ $device->merek_hp }}
                    </span>
                </div>

                <!-- Warna -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3" style="color:#07213D;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="none" stroke="#EEBF63" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M12 3a9 9 0 1 0 9 9c0-1.5-1-2-2-2h-2a2 2 0 0 1-2-2V6a3 3 0 0 0-3-3z"></path>
                        </svg>
                        <span class="font-medium">Warna</span>
                    </div>
                    <span style="color:#07213D;">
                        {{ $device->warna_hp }}
                    </span>
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4 flex-wrap mt-10">

                <!-- Download -->
                <button onclick="downloadQRasPNG()"
                    class="flex-1 min-w-[170px] px-6 py-3 rounded-xl text-sm font-semibold
                           transition-all hover:-translate-y-1 hover:shadow-lg
                           flex items-center justify-center gap-2"
                    style="background:#07213D; color:#FFFFFF;">

                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path d="M12 3v12"></path>
                        <path d="M7 10l5 5 5-5"></path>
                        <path d="M5 21h14"></path>
                    </svg>

                    Download QR
                </button>

                <!-- Copy -->
                <button onclick="copyQRLink()"
                    class="flex-1 min-w-[170px] px-6 py-3 rounded-xl text-sm font-semibold
                           border transition-all hover:shadow-md
                           flex items-center justify-center gap-2"
                    style="border-color:#07213D; color:#07213D;">

                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <rect x="9" y="9" width="13" height="13" rx="2"></rect>
                        <path d="M5 15V5a2 2 0 0 1 2-2h10"></path>
                    </svg>

                    Salin Link
                </button>

            </div>

        </div>

    </div>

</div>

<script>
// ENTER ANIMATION
document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.getElementById("page-wrapper");
    const backButton = document.getElementById("back-button");

    setTimeout(() => {
        wrapper.classList.remove("opacity-0", "translate-y-6");
        wrapper.classList.add("opacity-100", "translate-y-0");
    }, 50);

    backButton.addEventListener("click", function(e) {
        e.preventDefault();
        wrapper.classList.add("opacity-0", "translate-x-6");
        setTimeout(() => {
            window.location.href = this.href;
        }, 350);
    });
});

function downloadQRasPNG() {
    const qrContainer = document.getElementById('qr-container');
    const svg = qrContainer.querySelector('svg');
    const svgData = new XMLSerializer().serializeToString(svg);
    const img = new Image();
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");
    const svgBlob = new Blob([svgData], {type: "image/svg+xml;charset=utf-8;"});
    const url = URL.createObjectURL(svgBlob);

    img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0);
        const pngFile = canvas.toDataURL("image/png");

        const ownerName = "{{ $device->nama_pemilik }}"
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, "-")
            .replace(/^-|-$/g, "");

        const a = document.createElement("a");
        a.href = pngFile;
        a.download = `qr-device-${ownerName}.png`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        URL.revokeObjectURL(url);
    };

    img.src = url;
}

function copyQRLink() {
    const link = "{{ url('/public/devices/' . $device->uuid) }}";
    navigator.clipboard.writeText(link);
}
</script>

</x-app-layout>
