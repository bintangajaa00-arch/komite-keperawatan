<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();

            $table->foreignId('data_personal_id')
                ->constrained('data_personals')
                ->onDelete('cascade');

            $table->string('nama_sertifikat');
            $table->string('file_sertifikat');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};