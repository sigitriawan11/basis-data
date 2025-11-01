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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 20)->unique()->comment('Nomor Rekam Medis');
            $table->string('nik', 16)->unique()->comment('Nomor KTP');
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('pasiens');
    }
};
