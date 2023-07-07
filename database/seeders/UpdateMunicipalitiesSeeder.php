<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateMunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualizar municipio con id 41
        DB::table('municipalities')
            ->where('id', 41)
            ->update(['zone_id' => 6]);

        // Eliminar municipio con id 38
        DB::table('municipalities')
            ->where('id', 38)
            ->delete();

        // Eliminar municipio con id 43
        DB::table('municipalities')
            ->where('id', 43)
            ->delete();
    }

}
