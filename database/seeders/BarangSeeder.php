<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'SN' => '123123',
            'nama' => 'Laptop',
            'merk' => 'Lenovo Ideapad 3',
            'spesifikasi' => 'Bagus',
            'jumlah barang' => '10',
            'no_kontrak' => '123/ABC',
            'nama_kontrak' => 'Rektor/Pengadaan',
            'tgl_kontrak' => '2024-02-10',
            'lokasi' => 'Ruang Rapat',
            'tahun_perolehan' => '2024'
        ]);
    }
}
