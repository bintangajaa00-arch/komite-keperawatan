<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('oppes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('data_personal_id')
                ->constrained('data_personals')
                ->cascadeOnDelete();

            $table->string('nama_oppe');
            $table->string('file_oppe');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oppes');
    }
};