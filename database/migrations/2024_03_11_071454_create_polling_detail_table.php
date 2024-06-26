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
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('id_polling');
            $table->foreign('id_polling')->references('id_polling')->on('polling');
            $table->string('kode_matkul');
            $table->foreign('kode_matkul')->references('kode_matkul')->on('mata_kuliah');
            $table->string('nrp')->nullable();
            $table->foreign('nrp')->references('nrp')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling_detail');
    }
};
