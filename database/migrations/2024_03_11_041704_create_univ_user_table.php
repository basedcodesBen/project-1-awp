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
        Schema::create('univ_user', function (Blueprint $table) {
            $table->char('nrp')->primary();
            $table->string('id_role');
            $table->foreign('id_role')->references('id_role')->on('role');
            $table->string('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('name');
            $table->date('birthdate');
            $table->string('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('univ_user');
    }
};
