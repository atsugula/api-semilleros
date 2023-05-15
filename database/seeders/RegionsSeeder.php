<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'description' => "Region 1",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 2",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 3",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 4",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 5",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 6",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 7",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "Region 8",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        DB::table('regions')->insert($regions);
    }
}
