<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">Input Data Perangkat</h2>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white p-6 shadow sm:rounded-lg">

<form action="{{ route('devices.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
<label>Nama Pemilik</label>
<input type="text" name="nama_pemilik" class="border w-full p-2 rounded" required>
</div>

<div class="mb-3">
<label>IMEI</label>
<input type="text" name="imei" class="border w-full p-2 rounded" required>
</div>

<div class="mb-3">
<label>Merek HP</label>
<input type="text" name="merek_hp" class="border w-full p-2 rounded" required>
</div>

<div class="mb-3">
<label>Warna HP</label>
<input type="text" name="warna_hp" class="border w-full p-2 rounded" required>
</div>

<div class="mb-3">
<label>Foto Pemilik</label>
<input type="file" name="foto_pemilik" class="border w-full p-2 rounded" required>
</div>

<div class="mb-3">
<label>Foto HP</label>
<input type="file" name="foto_hp" class="border w-full p-2 rounded" required>
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded">
Simpan Data
</button>

</form>

</div>
</div>
</div>
</x-app-layout>
