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
            $table->char('nrp')->primary();
            $table->string('role');
            $table->string('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('name');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
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
