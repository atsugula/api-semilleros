<?php

namespace Database\Seeders;

use App\Models\Disciplines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplines::create([
            'name' => 'FUTBOL'
        ]);

        Disciplines::create([
            'name' => 'ACTIVIDADES SUBACUATICAS',
        ]);

        Disciplines::create([
            'name' => 'AJEDREZ'
        ]);

        Disciplines::create([
            'name' => 'ATLETISMO'
        ]);

        Disciplines::create([
            'name' => 'ATLETISMO ADAPTADO'
        ]);

        Disciplines::create([
            'name' => 'BADMINTÓN'
        ]);

        Disciplines::create([
            'name' => 'BALÓN MANO'
        ]);

        Disciplines::create([
            'name' => 'BALONCESTO'
        ]);

        Disciplines::create([
            'name' => 'BOXEO'
        ]);

        Disciplines::create([
            'name' => 'CICLISMO'
        ]);

        Disciplines::create([
            'name' => 'CICLOMONTAÑISMO'
        ]);

        Disciplines::create([
            'name' => 'FUTBOL AMERICANO'
        ]);

        Disciplines::create([
            'name' => 'FUTBOL DE SALON'
        ]);

        Disciplines::create([
            'name' => 'FUTBOL SALA'
        ]);

        Disciplines::create([
            'name' => 'GIMNASIA'
        ]);

        Disciplines::create([
            'name' => 'HAPKIDO'
        ]);

        Disciplines::create([
            'name' => 'JUDO'
        ]);

        Disciplines::create([
          'name' =>  'KARATE-DO'
        ]);

        Disciplines::create([
            'name' => 'LEVANTAMIENTOS DE PESAS'
        ]);

        Disciplines::create([
            'name' => 'LUCHA OLIMPICA'
        ]);

        Disciplines::create([
            'name' => 'NATACIÓN'
        ]);

        Disciplines::create([
            'name' => 'ORIENTACÍON DEPORTIVA'
        ]);

        Disciplines::create([
            'name' => 'PATINAJE'
        ]);

        Disciplines::create([
            'name' => 'RUGBY'
        ]);

        Disciplines::create([
            'name' => 'TEAKWONDO'
        ]);

        Disciplines::create([
            'name' => 'TEJO'
        ]);

        Disciplines::create([
            'name' => 'TENIS DE MESA'
        ]);

        Disciplines::create([
            'name' => 'TIRO CON ARCO'
        ]);

        Disciplines::create([
            'name' => 'VOLEIBOL'
        ]);
    }
}
