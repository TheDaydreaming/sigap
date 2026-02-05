<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
    'nama_pemilik',
    'imei',
    'merek_hp',
    'warna_hp',
    'foto_pemilik',
    'foto_hp'
];

}
