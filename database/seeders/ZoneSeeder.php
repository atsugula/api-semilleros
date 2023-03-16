<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'name' => 'REGION 1'
        ]);

        Zone::create([
            'name' => 'REGION 2'
        ]);

        Zone::create([
            'name' => 'REGION 3'
        ]);

        Zone::create([
            'name' => 'REGION 4'
        ]);

        Zone::create([
            'name' => 'REGION 5'
        ]);

        Zone::create([
            'name' => 'REGION 6'
        ]);

        Zone::create([
            'name' => 'REGION 7'
        ]);

        Zone::create([
            'name' => 'REGION 8'
        ]);
    }
}
