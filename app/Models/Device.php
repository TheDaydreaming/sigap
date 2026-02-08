<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Device extends Model
{
    protected $fillable = [
        'nama_pemilik',
        'imei',
        'merek_hp',
        'warna_hp',
        'foto_pemilik',
        'foto_hp',
        'uuid',
    ];

    /**
     * Pakai UUID sebagai route key (bukan ID)
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Auto-generate UUID saat data dibuat
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($device) {
            if (empty($device->uuid)) {
                $device->uuid = (string) Str::uuid();
            }
        });
    }
}
