<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_rm' => 'RM20251025001',
                'nik' => '1234567890987654',
                'nama_lengkap' => 'Joko',
                'tanggal_lahir' => '1965-10-23',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jalan jalan ke dufan',
                'kota' => 'Kepo',
                'provinsi' => 'Yogyakarta',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Nganggur',
                'status_pernikahan' => 'Menikah',
            ],
            [
                'no_rm' => 'RM20251025002',
                'nik' => '1234567890987655',
                'nama_lengkap' => 'Dani',
                'tanggal_lahir' => '1965-10-23',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jalan jalan ke ancol',
                'kota' => 'Kepo',
                'provinsi' => 'Bawah Jembatan',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Nganggur',
                'status_pernikahan' => 'Belum Menikah',
            ],
        ];

        foreach ($data as $key => $data) {
            Pasien::firstOrCreate($data);
        }
    }
}
