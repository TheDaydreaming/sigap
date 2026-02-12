<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

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
     * (TETAP KEMBALI KE HALAMAN CREATE BIAR MODAL SUKSES MUNCUL)
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

        // Simpan file
        $fotoPemilik = $request->file('foto_pemilik')->store('pemilik', 'public');
        $fotoHp = $request->file('foto_hp')->store('hp', 'public');

        Storage::disk('public')->setVisibility($fotoPemilik, 'public');
        Storage::disk('public')->setVisibility($fotoHp, 'public');

        $uuid = (string) Str::uuid();

        Device::create([
            'nama_pemilik' => $request->nama_pemilik,
            'imei' => $request->imei,
            'merek_hp' => $request->merek_hp,
            'warna_hp' => $request->warna_hp,
            'foto_pemilik' => $fotoPemilik,
            'foto_hp' => $fotoHp,
            'uuid' => $uuid,
        ]);

        return redirect()
            ->route('devices.create')
            ->with('success', 'Data perangkat berhasil disimpan!');
    }

    /**
     * HALAMAN LIST DATA (BLADE)
     */
    public function index(Request $request)
{
    $devices = Device::query()
        ->when($request->search, function ($q) use ($request) {
            $q->where('nama_pemilik', 'like', "%{$request->search}%")
              ->orWhere('imei', 'like', "%{$request->search}%");
        })
        ->latest()
        ->paginate(10);

    // ✅ JIKA AJAX → KIRIM HANYA TABEL (TIDAK ERROR LAGI)
    if ($request->ajax()) {
        return view('devices._table', compact('devices'));
    }

    // ✅ JIKA BUKA HALAMAN NORMAL
    return view('devices.index', compact('devices'));
}


    /**
     * DATA UNTUK DATATABLES (AJAX)
     */
    public function datatable(Request $request)
    {
        $query = Device::latest();

        if ($request->search['value'] ?? false) {
            $search = $request->search['value'];
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('imei', 'like', "%{$search}%");
            });
        }

        return DataTables::of($query)
            ->addColumn('foto_pemilik', function ($row) {
                return asset('storage/' . $row->foto_pemilik);
            })
            ->addColumn('foto_hp', function ($row) {
                return asset('storage/' . $row->foto_hp);
            })
            ->addColumn('aksi', function ($row) {
                return [
                    'id' => $row->id,
                    'uuid' => $row->uuid,
                ];
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * JSON UNTUK MODAL DETAIL & EDIT (PAKAI UUID)
     */
    public function json(Device $device)
    {
        return response()->json([
            'id' => $device->id,
            'uuid' => $device->uuid,
            'nama_pemilik' => $device->nama_pemilik,
            'imei' => $device->imei,
            'merek_hp' => $device->merek_hp,
            'warna_hp' => $device->warna_hp,
            'foto_pemilik' => $device->foto_pemilik,
            'foto_hp' => $device->foto_hp,
        ]);
    }

    /**
     * UPDATE DATA (DARI MODAL EDIT)
     * — TIDAK REDIRECT, BALIK JSON BIAR AJAX MULUS
     */
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'imei' => 'required|string|max:255|unique:devices,imei,' . $device->id,
            'merek_hp' => 'required|string|max:255',
            'warna_hp' => 'required|string|max:100',
        ]);

        $device->update($request->only([
            'nama_pemilik',
            'imei',
            'merek_hp',
            'warna_hp'
        ]));

        return response()->json([
            'message' => 'Data berhasil diperbarui'
        ]);
    }

    /**
     * LIST QR
     */
    public function qrList(Request $request)
{
    $devices = Device::query()
        ->when($request->search, function ($q) use ($request) {
            $q->where('nama_pemilik', 'like', "%{$request->search}%")
              ->orWhere('imei', 'like', "%{$request->search}%");
        })
        ->latest()
        ->paginate(10);   // <-- penting biar bisa pakai pagination + appends()

    return view('devices.qr-list', compact('devices'));
}

    /**
     * SHOW QR
     */
    public function qrShow(Device $device)
    {
        return view('devices.qr-show', compact('device'));
    }

    /**
     * HALAMAN PUBLIC (SCAN QR)
     */
    public function publicShow(Device $device)
    {
        return view('devices.public-show', compact('device'));
    }

    /**
     * HAPUS DATA (AJAX)
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);

        // Hapus file biar storage bersih
        Storage::disk('public')->delete($device->foto_pemilik);
        Storage::disk('public')->delete($device->foto_hp);

        $device->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
