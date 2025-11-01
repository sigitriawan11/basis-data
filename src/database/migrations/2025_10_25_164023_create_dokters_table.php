<?php

use App\Models\Poliklinik;
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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RumahSakit::class);
            $table->foreignIdFor(Poliklinik::class);
            $table->string('kode_dokter', 20)->unique();
            $table->string('nip');
            $table->string('str')->comment('Surat Tanda Registrasi Rumah Sakit');
            $table->string('spesialisasi');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->enum('golongan_darah', ['A', 'B', 'O', 'AB']);
            $table->string('pekerjaan', 100);
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
