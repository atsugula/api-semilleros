<?php

namespace Database\Seeders;

use App\Models\MethodologistVisitPersonalized;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MethodologistVisitPersonalizedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MethodologistVisitPersonalized::create([
            'month' => 'Enero',
            'theme' => 'test1',
            'qualification' => 5,
            'recommendations' => 'test1',
            'project_knowledge' => 'test1',
            'municipalitie_id' => 2,
            'user_id' => 5
        ]);

        MethodologistVisitPersonalized::create([
            'month' => 'Enero',
            'theme' => 'test2',
            'qualification' => 2,
            'recommendations' => 'test2',
            'project_knowledge' => 'test2',
            'municipalitie_id' => 3,
            'user_id' => 6
        ]);
    }
}
