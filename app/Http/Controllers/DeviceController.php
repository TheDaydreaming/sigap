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
            'nama_pemilik' => 'required',
            'imei' => 'required',
            'merek_hp' => 'required',
            'warna_hp' => 'required',
            'foto_pemilik' => 'required|image',
            'foto_hp' => 'required|image',
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

        return redirect('/devices')->with('success', 'Data berhasil disimpan');
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


}
