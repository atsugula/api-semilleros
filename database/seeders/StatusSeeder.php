<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Aprobado',
            'slug' => 'APR',
        ]);

        Status::create([
            'name' => 'En revision',
            'slug' => 'ENR',
        ]);

        Status::create([
            'name' => 'Ingresado',
            'slug' => 'ING',
        ]);

        Status::create([
            'name' => 'Rechazado',
            'slug' => 'REC',
        ]);

        Status::create([
            'name' => 'En proceso',
            'slug' => 'ENP',
        ]);

        Status::create([
            'name' => 'Completado',
            'slug' => 'COM',
        ]);

        Status::create([
            'name' => 'Archivado',
            'slug' => 'ARC',
        ]);

        Status::create([
            'name' => 'Anulado',
            'slug' => 'NUL',
        ]);
    }
}
