<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function create()
    {
        return view('devices.create');
    }

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

        $fotoPemilik = $request->file('foto_pemilik')->store('pemilik', 'public');
        $fotoHp = $request->file('foto_hp')->store('hp', 'public');

        Device::create([
            'nama_pemilik' => $request->nama_pemilik,
            'imei' => $request->imei,
            'merek_hp' => $request->merek_hp,
            'warna_hp' => $request->warna_hp,
            'foto_pemilik' => $fotoPemilik,
            'foto_hp' => $fotoHp,
        ]);

        return redirect()
            ->route('devices.index')
            ->with('success', 'Data perangkat berhasil disimpan');
    }

    public function index()
    {
        $devices = Device::latest()->get();
        return view('devices.index', compact('devices'));
    }

    public function qrList()
    {
        $devices = Device::latest()->get();
        return view('devices.qr-list', compact('devices'));
    }

    public function qrShow(Device $device)
    {
        return view('devices.qr-show', compact('device'));
    }

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    public function publicShow(Device $device)
    {
        return view('devices.public-show', compact('device'));
    }
}
