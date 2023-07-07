<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualizar roles existentes si es necesario

        // Añadir el rol "juridico"
        DB::table('roles')->insert([
            'name' => 'JURIDICO',
            'slug' => 'juridico',
            'description' => 'Rol juridico',
            'full-access' => 'no',
            'public' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Añadir el rol "contabilidad"
        DB::table('roles')->insert([
            'name' => 'CONTABILIDAD',
            'slug' => 'contabilidad',
            'description' => 'Rol contabilidad',
            'full-access' => 'no',
            'public' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
