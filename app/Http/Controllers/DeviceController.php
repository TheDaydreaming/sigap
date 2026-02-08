<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // ← PENTING untuk generate UUID

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
     * SIMPAN DATA PERANGKAT
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

        // Simpan foto ke storage/public
        $fotoPemilik = $request->file('foto_pemilik')->store('pemilik', 'public');
        $fotoHp = $request->file('foto_hp')->store('hp', 'public');

        // BUAT UUID MANUAL (BIAR RAILWAY TIDAK ERROR)
        $uuid = (string) Str::uuid();

        Device::create([
            'nama_pemilik' => $request->nama_pemilik,
            'imei' => $request->imei,
            'merek_hp' => $request->merek_hp,
            'warna_hp' => $request->warna_hp,
            'foto_pemilik' => $fotoPemilik,
            'foto_hp' => $fotoHp,
            'uuid' => $uuid, // ← PENTING!
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
     * HALAMAN PUBLIC (HASIL SCAN QR)
     */
    public function publicShow(Device $device)
    {
        return view('devices.public-show', compact('device'));
    }
}
