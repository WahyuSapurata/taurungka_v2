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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('role');

            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('usia')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pedidikan_terakhir')->nullable();
            $table->string('foto')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
