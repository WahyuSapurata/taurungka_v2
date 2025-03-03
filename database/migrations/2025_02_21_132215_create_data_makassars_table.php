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
        Schema::create('data_makassars', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nama');
            $table->string('nilai');
            $table->string('satuan');
            $table->string('icon');
            $table->integer('position')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_makassars');
    }
};
