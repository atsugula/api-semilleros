<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = [
            [
                'description' => 'Zarzal',
                'region_id' =>  1
            ],

            [
                'description' => 'Cartago',
                'region_id' =>  1
            ],

            [
                'description' => 'Ansermanuevo',
                'region_id' =>  1
            ],

            [
                'description' => 'El Cairo',
                'region_id' =>  1
            ],

            [
                'description' => 'El Águila',
                'region_id' =>  1
            ],

            [
                'description' => 'Alcalá',
                'region_id' =>  1
            ],

            [
                'description' => 'Ulloa',
                'region_id' =>  1
            ],

            [
                'description' => 'Argelia',
                'region_id' =>  1
            ],

            [
                'description' => 'Obando',
                'region_id' =>  1
            ],

            [
                'description' => 'La Victoria',
                'region_id' =>  1
            ],

            [
                'description' => 'Tuluá',
                'region_id' =>  2
            ],

            [
                'description' => 'San Pedro',
                'region_id' =>  2
            ],

            [
                'description' => 'Bugalagrande',
                'region_id' =>  2
            ],

            [
                'description' => 'Andalucia',
                'region_id' =>  2
            ],

            [
                'description' => 'Sevilla',
                'region_id' =>  2
            ],

            [
                'description' => 'Caicedonia',
                'region_id' =>  2
            ],

            [
                'description' => 'Versalles',
                'region_id' =>  3
            ],

            [
                'description' => 'Trujillo',
                'region_id' =>  3
            ],

            [
                'description' => 'Toro',
                'region_id' =>  3
            ],

            [
                'description' => 'Roldanillo',
                'region_id' =>  3
            ],

            [
                'description' => 'Riofrio',
                'region_id' =>  3
            ],

            [
                'description' => 'La Unión',
                'region_id' =>  3
            ],

            [
                'description' => 'El Dovio',
                'region_id' =>  3
            ],

            [
                'description' => 'Bolívar',
                'region_id' =>  3
            ],

            [
                'description' => 'Vijes',
                'region_id' =>  4
            ],

            [
                'description' => 'Calima',
                'region_id' =>  4
            ],

            [
                'description' => 'Restrepo',
                'region_id' =>  4
            ],

            [
                'description' => 'Yotoco',
                'region_id' =>  4
            ],

            [
                'description' => 'Buga',
                'region_id' =>  4
            ],

            [
                'description' => 'Buenaventura',
                'region_id' =>  5
            ],

            [
                'description' => 'Dagua',
                'region_id' =>  5
            ],

            [
                'description' => 'Ginebra',
                'region_id' =>  6
            ],

            [
                'description' => 'El Cerrito',
                'region_id' =>  6
            ],

            [
                'description' => 'Guacarí',
                'region_id' =>  6
            ],

            [
                'description' => 'Candelaria',
                'region_id' =>  6
            ],

            [
                'description' => 'Pradera',
                'region_id' =>  6
            ],

            [
                'description' => 'Florida',
                'region_id' =>  6
            ],

            [
                'description' => 'Jamundi',
                'region_id' =>  7
            ],

            [
                'description' => 'Yumbo',
                'region_id' =>  7
            ],

            [
                'description' => 'La Cumbre',
                'region_id' =>  7
            ],

            [
                'description' => 'Cali',
                'region_id' =>  7
            ],

            [
                'description' => 'Palmira',
                'region_id' =>  8
            ]
        ];

        DB::table('municipalities')->insert($municipalities);
    }
}
