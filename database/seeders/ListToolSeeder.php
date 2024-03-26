<?php

namespace Database\Seeders;

use App\Models\Ceklis\ListTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListToolSeeder extends Seeder
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
                'tool_id' => 1,
                'description' => 'Gate 1'
            ],
            [
                'tool_id' => 1,
                'description' => 'Gate 2'
            ],
            [
                'tool_id' => 1,
                'description' => 'Gate 3'
            ],
            [
                'tool_id' => 1,
                'description' => 'Gate 4'
            ],
            [
                'tool_id' => 1,
                'description' => 'LCM'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 9'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 10'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 11'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 12'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 13'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 14'
            ],
            [
                'tool_id' => 2,
                'description' => 'Gate 15'
            ],
            [
                'tool_id' => 3,
                'description' => 'POS 19'
            ],
            [
                'tool_id' => 3,
                'description' => 'POS 20'
            ],
            [
                'tool_id' => 3,
                'description' => 'POS 21'
            ],
            [
                'tool_id' => 4,
                'description' => 'VM 1'
            ],
            [
                'tool_id' => 4,
                'description' => 'VM 2'
            ],
            [
                'tool_id' => 4,
                'description' => 'VM 3'
            ],
            [
                'tool_id' => 4,
                'description' => 'VM 4'
            ],
            [
                'tool_id' => 5,
                'description' => 'MB 1'
            ],
            [
                'tool_id' => 5,
                'description' => 'MB 2'
            ],
            [
                'tool_id' => 5,
                'description' => 'MB 3'
            ],
            [
                'tool_id' => 5,
                'description' => 'MB 4'
            ],
            [
                'tool_id' => 6,
                'description' => '1'
            ],
            [
                'tool_id' => 6,
                'description' => '2'
            ],
            [
                'tool_id' => 6,
                'description' => '3'
            ],
            [
                'tool_id' => 6,
                'description' => '4'
            ],
            [
                'tool_id' => 6,
                'description' => 'MB 1'
            ],
            [
                'tool_id' => 6,
                'description' => 'MB 2'
            ],
            [
                'tool_id' => 7,
                'description' => 'LCM 1'
            ],
            [
                'tool_id' => 7,
                'description' => 'LCM 2'
            ],
            [
                'tool_id' => 7,
                'description' => 'LCM 3'
            ],
        ];

        // Iterasi melalui array dan masukkan ke dalam tabel
        foreach ($tools as $tool) {
            ListTool::create($tool);
        }
    }
}
