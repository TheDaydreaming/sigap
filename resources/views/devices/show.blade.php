<div class="mt-4 grid grid-cols-2 gap-4">
    <div>
        <p class="font-semibold mb-1">Foto Pemilik</p>
        <img src="{{ asset('storage/'.$device->foto_pemilik) }}" 
             class="w-full max-w-[200px] rounded-lg shadow">
    </div>

    <div>
        <p class="font-semibold mb-1">Foto HP</p>
        <img src="{{ asset('storage/'.$device->foto_hp) }}" 
             class="w-full max-w-[200px] rounded-lg shadow">
    </div>
</div>
