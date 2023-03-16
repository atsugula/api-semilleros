<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direction::create([
            'name' => 'Calle'
        ]);

        Direction::create([
            'name' => 'Avenida'
        ]);

        Direction::create([
            'name' => 'Avenida calle'
        ]);

        Direction::create([
            'name' => 'Avenida carrera'
        ]);

        Direction::create([
            'name' => 'Diagonal'
        ]);

        Direction::create([
            'name' => 'Transversal'
        ]);

        Direction::create([
            'name' => 'Kilometro'
        ]);

        Direction::create([
            'name' => 'Manzana'
        ]);

    }
}
