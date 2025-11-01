<?php

namespace Database\Seeders;

use App\Models\Poliklinik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poli = [
            [
                'kode_poli' => 'POLI001',
                'nama' => 'Poli Umum',
                'desk' => 'Penyakit umum',
                'lokasi' => 'lantai 1',
            ],
            [
                'kode_poli' => 'POLI002',
                'nama' => 'Poli Anak',
                'desk' => 'Penyakit anak',
                'lokasi' => 'lantai 2'
            ],
        ];

        foreach ($poli as $data) {
            Poliklinik::firstOrCreate([
                'rumah_sakit_id' => 1,
                'nama_poli' => $data['nama'],
                'deskripsi' => $data['desk'],
                'kode_poli' => $data['kode_poli'],
                'lokasi' => $data['lokasi'],
                'status' => 'aktif'
            ]);
        }
    }
}
