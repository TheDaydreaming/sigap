<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        // 1) Tambah kolom UUID (boleh null dulu)
        Schema::table('devices', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id');
        });

        // 2) Isi UUID untuk semua data lama
        DB::table('devices')->get()->each(function ($device) {
            DB::table('devices')
                ->where('id', $device->id)
                ->update(['uuid' => (string) Str::uuid()]);
        });

        // 3) Baru jadikan UNIQUE
        Schema::table('devices', function (Blueprint $table) {
            $table->unique('uuid');
        });
    }

    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
