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
        Schema::create('peralatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peralatan');
            $table->string('kode_peralatan')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('kategori'); // Senjata, Kendaraan, Elektronik, Furnitur, dll
            $table->string('merek')->nullable();
            $table->date('tanggal_perolehan');
            $table->date('tanggal_maintenance')->nullable();
            $table->string('lokasi_penyimpanan');
            $table->enum('status', ['tersedia', 'rusak', 'hilang'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peralatan');
    }
};
