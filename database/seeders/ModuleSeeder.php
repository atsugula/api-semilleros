<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    protected $modules = [
        ['Configuración', 'setting', 1, 'SettingsIcon'],
        ['Dashboard', 'dashboard', 0, ''],
        ['Administración', 'administration', 1, 'LayersIcon'],
        ['Contratación', 'contracting', 1, 'LayersIcon'],
        ['Juridico', 'juridical', 1, 'LayersIcon'],
        ['Juridico Admin', 'juridical_admin', 1, 'LayersIcon'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->modules as $key => $value) {
            DB::table('modules')->insert([
                [
                    'name' => $value[0],
                    'slug' => $value[1],
                    'icon' => $value[3],
                    'available' => 1,
                    'position' => $key + 1,
                    'hasItems' => $value[2]
                ],
            ]);
        }
    }
}
