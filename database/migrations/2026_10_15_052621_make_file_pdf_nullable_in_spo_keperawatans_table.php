<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('spo_keperawatans', function (Blueprint $table) {
            $table->string('file_pdf')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('spo_keperawatans', function (Blueprint $table) {
            $table->string('file_pdf')->nullable(false)->change();
        });
    }
};
