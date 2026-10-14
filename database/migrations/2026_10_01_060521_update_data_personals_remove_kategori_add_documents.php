<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('data_personals', function (Blueprint $table) {
            $table->dropColumn([
                'kategori',
                'sub_kategori',
            ]);

            $table->string('sk_penempatan_kerja')->nullable();
            $table->string('uraian_tugas')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('data_personals', function (Blueprint $table) {
            $table->string('kategori')->nullable();
            $table->string('sub_kategori')->nullable();

            $table->dropColumn([
                'sk_penempatan_kerja',
                'uraian_tugas',
            ]);
        });
    }
};