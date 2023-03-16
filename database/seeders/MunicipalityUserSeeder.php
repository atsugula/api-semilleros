<?php

namespace Database\Seeders;

use App\Models\MunicipalityUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MunicipalityUser::create([
            'user_id' => '1',
            'municipalities_id' => '2'
        ]);

        MunicipalityUser::create([
            'user_id' => '1',
            'municipalities_id' => '3'
        ]);

        MunicipalityUser::create([
            'user_id' => '1',
            'municipalities_id' => '1'
        ]);

        MunicipalityUser::create([
            'user_id' => '1',
            'municipalities_id' => '4'
        ]);

        MunicipalityUser::create([
            'user_id' => '2',
            'municipalities_id' => '2'
        ]);

        MunicipalityUser::create([
            'user_id' => '2',
            'municipalities_id' => '3'
        ]);
    }
}
