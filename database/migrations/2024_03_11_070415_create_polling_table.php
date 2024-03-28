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
        Schema::create('polling', function (Blueprint $table) {
            $table->string('id_polling')->primary();
            $table->string('judul_polling');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_selesai');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling');
    }
};
