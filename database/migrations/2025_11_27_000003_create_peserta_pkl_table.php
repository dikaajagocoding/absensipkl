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
        Schema::create('peserta_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_induk')->unique();
            $table->string('sekolah');
            $table->string('jurusan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('pembimbing')->nullable();
            $table->enum('status', ['aktif', 'selesai', 'berhenti'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_pkl');
    }
};
