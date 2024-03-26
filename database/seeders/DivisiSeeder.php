<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
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
            ['divisi' => 'Teknik'],
            ['divisi' => 'Keuangan'],
            ['divisi' => 'SCM'],
            // Tambahkan divisi lainnya sesuai kebutuhan
        ];

        // Iterasi melalui array dan masukkan ke dalam tabel
        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }
}
