<?php

namespace Database\Seeders;

use App\Models\Ceklis\Harbour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HarbourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array data divisi
        $divisis = [
            ['name' => 'Ketapang'],
            ['name' => 'Gilimanuk'],
            // Tambahkan divisi lainnya sesuai kebutuhan
        ];

        // Iterasi melalui array dan masukkan ke dalam tabel
        foreach ($divisis as $divisi) {
            Harbour::create($divisi);
        }
    }
}
