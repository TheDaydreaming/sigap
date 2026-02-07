<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DeviceController extends Controller
{
    /**
     * FORM INPUT PERANGKAT
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * SIMPAN DATA PERANGKAT (DENGAN KOMPRES GAMBAR)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'imei' => 'required|string|max:255|unique:devices,imei',
            'merek_hp' => 'required|string|max:255',
            'warna_hp' => 'required|string|max:100',
            'foto_pemilik' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'foto_hp' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // ========== KOMPRES FOTO PEMILIK ==========
        $fotoPemilik = $request->file('foto_pemilik');
        $namaPemilik = 'pemilik_' . time() . '.jpg';

        $imgPemilik = Image::make($fotoPemilik)
            ->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75); // kualitas 75%

        Storage::disk('public')->put('pemilik/' . $namaPemilik, $imgPemilik);

        // ========== KOMPRES FOTO HP ==========
        $fotoHp = $request->file('foto_hp');
        $namaHp = 'hp_' . time() . '.jpg';

        $imgHp = Image::make($fotoHp)
            ->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75);

        Storage::disk('public')->put('hp/' . $namaHp, $imgHp);

        // ========== SIMPAN KE DATABASE ==========
        Device::create([
            'nama_pemilik' => $request->nama_pemilik,
            'imei' => $request->imei,
            'merek_hp' => $request->merek_hp,
            'warna_hp' => $request->warna_hp,
            'foto_pemilik' => 'pemilik/' . $namaPemilik,
            'foto_hp' => 'hp/' . $namaHp,
        ]);

        return redirect()
            ->route('devices.index')
            ->with('success', 'Data perangkat berhasil disimpan');
    }

    /**
     * HALAMAN DAFTAR PERANGKAT (ADMIN)
     */
    public function index()
    {
        $devices = Device::latest()->get();
        return view('devices.index', compact('devices'));
    }

    /**
     * HALAMAN DAFTAR QR (ADMIN)
     */
    public function qrList()
    {
        $devices = Device::latest()->get();
        return view('devices.qr-list', compact('devices'));
    }

    /**
     * HALAMAN TAMPIL QR (ADMIN)
     */
    public function qrShow(Device $device)
    {
        return view('devices.qr-show', compact('device'));
    }

    /**
     * DETAIL PERANGKAT (ADMIN - BUTUH LOGIN)
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * HALAMAN PUBLIC (SCAN QR)
     */
    public function publicShow(Device $device)
    {
        return view('devices.public-show', compact('device'));
    }
}
