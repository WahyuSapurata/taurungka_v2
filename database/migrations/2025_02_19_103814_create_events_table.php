<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('uuid_user');
            $table->string('nama_event');
            $table->string('tanggal_event');
            $table->integer('kouta_kegiatan');
            $table->text('konten_kegiatan');
            $table->string('tempat');
            $table->string('status_daftar');
            $table->string('dukumen')->nullable();
            $table->string('banner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
