<?php

namespace Database\Seeders;

use App\Models\Ceklis\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
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
            [
                'tools_name' => 'Tolgate',
                'tools_desc' => 'Gate'
            ],
            [
                'tools_name' => 'Loket Motor',
                'tools_desc' => 'Gate'
            ],
            [
                'tools_name' => 'Loket Penumpang',
                'tools_desc' => 'POS'
            ],
            [
                'tools_name' => 'Vending Machine',
                'tools_desc' => 'Vending Machine'
            ],
            [
                'tools_name' => 'Manless Dermaga',
                'tools_desc' => 'Manless Dermaga'
            ],
            [
                'tools_name' => 'Trunstile Penumpang',
                'tools_desc' => 'Trunstile Penumpang'
            ],
            [
                'tools_name' => 'Hanheld Dermaga',
                'tools_desc' => 'Hanheld Dermaga'
            ],
            // [
            //     'tools_name' => 'Loket Portable',
            //     'tools_desc' => 'Gate'
            // ],
            // Add more data as needed
        ];

        // Iterasi melalui array dan masukkan ke dalam tabel
        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
