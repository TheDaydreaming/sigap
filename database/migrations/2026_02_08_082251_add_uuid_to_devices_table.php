<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        // 1️⃣ Tambah kolom jika belum ada
        if (!Schema::hasColumn('devices', 'uuid')) {

            Schema::table('devices', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->after('id');
            });

            // 2️⃣ Isi UUID untuk data lama
            DB::table('devices')->whereNull('uuid')->get()->each(function ($device) {
                DB::table('devices')
                    ->where('id', $device->id)
                    ->update(['uuid' => (string) Str::uuid()]);
            });

            // 3️⃣ Tambahkan unique index
            Schema::table('devices', function (Blueprint $table) {
                $table->unique('uuid');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('devices', 'uuid')) {
            Schema::table('devices', function (Blueprint $table) {
                $table->dropUnique(['uuid']);
                $table->dropColumn('uuid');
            });
        }
    }
};
