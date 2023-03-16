<?php

namespace Database\Seeders;

use App\Models\CoordinatorVisit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordinatorVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoordinatorVisit::create([
            'hour_visit' => '10:30',
            'date_visit' => '2021-03-25',
            'observations' => 'Todo Ok',
            'description' => 'Test1',
            'sports_scene' => 'Futbol',
            'beneficiary_coverage' => 'Julian Lora',
            'municipalitie_id' => 5,
          //  'sidewalk_id' => 4,
            'user_id' => 9,
            'discipline_id' =>9
        ]);

        CoordinatorVisit::create([
            'hour_visit' => '10:30',
            'date_visit' => '2021-03-25',
            'observations' => 'Todo Ok',
            'description' => 'Test2',
            'sports_scene' => 'Futbol playa',
            'beneficiary_coverage' => 'Pedro Diaz',
            'municipalitie_id' => 6,
         //   'sidewalk_id' => 23,
            'user_id' => 5,
            'discipline_id' =>10
        ]);

        CoordinatorVisit::create([
            'hour_visit' => '12:40',
            'date_visit' => '2021-03-25',
            'observations' => 'Todo Ok',
            'description' => 'Test3',
            'sports_scene' => 'Futbol playa',
            'beneficiary_coverage' => 'Juan Florez',
            'municipalitie_id' => 9,
          //  'sidewalk_id' => 7,
            'user_id' => 14,
            'discipline_id' =>3
        ]);
    }
}
