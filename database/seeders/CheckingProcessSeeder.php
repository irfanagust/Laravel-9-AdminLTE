<?php

namespace Database\Seeders;

use App\Models\Ceklis\CheckingProcessTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckingProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array data divisi
        $tools = [
            // TOLGATE
            [
                'tool_id' => 1,
                'description' => 'PILIH JENIS GOLONGAN'
            ],
            [
                'tool_id' => 1,
                'description' => 'INPUT KODE BOOKING (SCAN TIKET)'
            ],
            [
                'tool_id' => 1,
                'description' => 'COMPARE DATA TIKET'
            ],
            [
                'tool_id' => 1,
                'description' => 'PRINT TIKET'
            ],

            // LOKET MOTER
            [
                'tool_id' => 2,
                'description' => 'PILIH JENIS GOLONGAN'
            ],
            [
                'tool_id' => 2,
                'description' => 'INPUT KODE BOOKING (SCAN TIKET)'
            ],
            [
                'tool_id' => 2,
                'description' => 'COMPARE DATA TIKET'
            ],
            [
                'tool_id' => 2,
                'description' => 'PRINT TIKET'
            ],

            // LOKET PENUMPANG
            [
                'tool_id' => 3,
                'description' => 'PILIH JENIS GOLONGAN'
            ],
            [
                'tool_id' => 3,
                'description' => 'INPUT KODE BOOKING (SCAN TIKET)'
            ],
            [
                'tool_id' => 3,
                'description' => 'COMPARE DATA TIKET'
            ],
            [
                'tool_id' => 3,
                'description' => 'PRINT TIKET'
            ],

            // VENDING MACHINE
            [
                'tool_id' => 4,
                'description' => 'PILIH MENU CETAK BOARDING PASS'
            ],
            [
                'tool_id' => 4,
                'description' => 'INPUT KODE BOOKING (SCAN TIKET)'
            ],
            [
                'tool_id' => 4,
                'description' => 'PRINT TIKET'
            ],

            // MANLESS DERMAGA
            [
                'tool_id' => 5,
                'description' => 'SCAN TIKET'
            ],

            // TRUNSTILE PENUMPANG
            [
                'tool_id' => 6,
                'description' => 'PILIH MENU CETAK BOARDING PASS'
            ],

            // HANDHELD DERMAGA
            [
                'tool_id' => 7,
                'description' => 'OPEN APLIKASI'
            ],
            [
                'tool_id' => 7,
                'description' => 'LOGIN'
            ],
            [
                'tool_id' => 7,
                'description' => 'SCAN TIKET'
            ],
        ];

        // Iterasi melalui array dan masukkan ke dalam tabel
        foreach ($tools as $tool) {
            CheckingProcessTool::create($tool);
        }
    }
}
