<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl tracking-wide" style="color:#07213D;">
        QR Code Perangkat
    </h2>
</x-slot>

<div class="py-10 min-h-screen"
     style="background:linear-gradient(180deg, #FFFFFF 0%, #E0E2E3 100%);">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

<div class="max-w-xl mx-auto">

<!-- ===== DECORATIVE TOP ACCENT LINE ===== -->
<div class="h-1 w-24 mx-auto rounded-full mb-3"
     style="background:#EEBF63;">
</div>

<!-- ===== TOP CARD (INFO DEVICE) ===== -->
<div class="rounded-t-3xl shadow-xl p-7 border relative overflow-hidden"
     style="background:#FFFFFF; border-color:#E0E2E3;">

    <!-- Subtle Gold Glow -->
    <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full opacity-10"
         style="background:#EEBF63; filter: blur(40px);">
    </div>

    <div class="text-center relative">
        <div class="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider mb-3"
             style="background:rgba(238,191,99,0.18); color:#07213D;">
            DEVICE QR CODE
        </div>

        <h3 class="text-2xl font-bold tracking-tight" style="color:#07213D;">
            {{ $device->nama_pemilik }}
        </h3>

        <div class="mt-2 text-sm font-mono"
             style="color:#07213D; opacity:0.8;">
            IMEI: {{ $device->imei }}
        </div>
    </div>
</div>

<!-- ===== BOTTOM CARD (QR AREA) ===== -->
<div class="rounded-b-3xl shadow-xl border-t p-8 text-center relative"
     style="background:#FFFFFF; border-color:#E0E2E3;">

    <!-- Side Accent -->
    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-16 w-1 rounded-r-full"
         style="background:#EEBF63;">
    </div>

    <div class="rounded-2xl p-7 border transition-transform hover:scale-[1.01]"
         style="background:#E0E2E3; border-color:#E0E2E3;">

        <div id="qr-container"
             class="inline-block bg-white p-6 rounded-2xl shadow-lg mb-4
                    transition-shadow hover:shadow-xl">

            {!! QrCode::size(320)
                ->margin(2)
                ->errorCorrection('H')
                ->generate(url('/public/devices/' . $device->uuid)) !!}
        </div>

        <p class="text-sm mb-5" style="color:#07213D;">
            Scan QR ini untuk melihat detail perangkat.
        </p>

        <button onclick="downloadQRasPNG()"
            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-semibold 
                   transition-all hover:translate-y-[-1px] hover:shadow-lg"
            style="background:#07213D; color:#FFFFFF;">
            ⬇️ Download QR (PNG)
        </button>
    </div>

    <div class="mt-6">
        <a href="{{ route('devices.qr.list') }}"
           class="text-sm font-medium hover:underline"
           style="color:#07213D;">
            ← Kembali ke daftar
        </a>
    </div>

</div>

</div>
</div>
</div>

<!-- SCRIPT DOWNLOAD PNG (TIDAK DIUBAH) -->
<script>
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
</script>

</x-app-layout>
