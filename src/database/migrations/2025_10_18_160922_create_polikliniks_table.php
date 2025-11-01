<?php

use App\Models\RumahSakit;
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
        Schema::create('polikliniks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RumahSakit::class);
            $table->string('nama_poli');
            $table->string('deskripsi');
            $table->string('kode_poli', 20)->unique();
            $table->string('lokasi');
            $table->time('jam_buka')->default('08:00:00');
            $table->time('jam_tutup')->default('16:00:00');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polikliniks');
    }
};
