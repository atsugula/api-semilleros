<?php

namespace Database\Seeders;

use App\Models\ZoneUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //AUXILIAR ADMINISTRATIVO
        ZoneUser::create([
            'user_id' => 3,
            'zones_id' => 1
        ]);

        ZoneUser::create([
            'user_id' => 4,
            'zones_id' => 2
        ]);

        ZoneUser::create([
            'user_id' => 5,
            'zones_id' => 3
        ]);

        ZoneUser::create([
            'user_id' => 6,
            'zones_id' => 4
        ]);

        ZoneUser::create([
            'user_id' => 7,
            'zones_id' => 5
        ]);

        ZoneUser::create([
            'user_id' => 8,
            'zones_id' => 6
        ]);

        ZoneUser::create([
            'user_id' => 9,
            'zones_id' => 7
        ]);

        ZoneUser::create([
            'user_id' => 10,
            'zones_id' => 8
        ]);

         //JURIDICOS
         ZoneUser::create([
            'user_id' => 11,
            'zones_id' => 1
        ]);

        ZoneUser::create([
            'user_id' => 12,
            'zones_id' => 2
        ]);

        /* ZoneUser::create([
            'user_id' => 13,
            'zones_id' => 3
        ]);

        ZoneUser::create([
            'user_id' => 14,
            'zones_id' => 4
        ]);

        ZoneUser::create([
            'user_id' => 15,
            'zones_id' => 5
        ]);

        ZoneUser::create([
            'user_id' => 16,
            'zones_id' => 6
        ]);

        ZoneUser::create([
            'user_id' => 17,
            'zones_id' => 7
        ]);

        ZoneUser::create([
            'user_id' => 18,
            'zones_id' =>8
        ]);

        //SUPERVISORES
        ZoneUser::create([
            'user_id' => 19,
            'zones_id' =>1
        ]); */

        /* ZoneUser::create([
            'user_id' => 20,
            'zones_id' =>2
        ]);

        ZoneUser::create([
            'user_id' => 21,
            'zones_id' =>3
        ]);

        ZoneUser::create([
            'user_id' => 22,
            'zones_id' =>4
        ]);

        ZoneUser::create([
            'user_id' => 23,
            'zones_id' =>5
        ]);

        ZoneUser::create([
            'user_id' => 24,
            'zones_id' =>6
        ]);

        ZoneUser::create([
            'user_id' => 25,
            'zones_id' =>7
        ]);

        ZoneUser::create([
            'user_id' => 26,
            'zones_id' =>8
        ]); */
    }
}
