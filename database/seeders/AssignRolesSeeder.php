<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asignar el rol 'CONTABILIDAD' al usuario con ID 24
        $user24 = User::findOrFail(24);
        $roleContabilidad = Role::where('name', 'CONTABILIDAD')->first();
        $user24->roles()->sync([$roleContabilidad->id]);

        // Asignar el rol 'JURIDICO' al usuario con ID 22
        $user22 = User::findOrFail(22);
        $roleJuridico = Role::where('name', 'JURIDICO')->first();
        $user22->roles()->sync([$roleJuridico->id]);
    }
    
}
