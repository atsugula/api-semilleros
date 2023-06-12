<?php

namespace Database\Seeders;

use App\Models\Administrative;
use Illuminate\Database\Seeder;

class AdministrativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrative::create([
            'user_id' => 31, // KATHERINE MARTINEZ SANDOVAL
            'region_id' => 1, // REGION 1
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // NO ESTA EL USUARIO DE LA REGION 2 DIANA CRISTINA GARCIA NO EXISTE 

        Administrative::create([
            'user_id' => 32, // MARTHA LUCIA GONZALEZ RESTREPO
            'region_id' => 3, // REGION 3
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // NO ESTA EL USUARIO DE LA REGION 4 TOMAS MENDEZ ORTIZ NO EXISTE  

        Administrative::create([
            'user_id' => 29, // JUAN MAURICIO DINAS RODRIGUEZ
            'region_id' => 5, // REGION 5
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Administrative::create([
            'user_id' => 27, // CINDY JOHANNA FLOREZ UPARELA
            'region_id' => 6, // REGION 6
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Administrative::create([
            'user_id' => 34, // NATALIA TIRADO CAMACHO
            'region_id' => 7, // REGION 7
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Administrative::create([
            'user_id' => 30, // JULIETH DANIELA VELASQUEZ FERNANDEZ
            'region_id' => 8, // REGION 8
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
