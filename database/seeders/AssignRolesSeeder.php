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
        try {
            $user24 = User::findOrFail(24);
            $roleContabilidad = Role::where('name', 'CONTABILIDAD')->first();
            $user24->roles()->sync([$roleContabilidad->id]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        try {
            $user22 = User::findOrFail(411);
            $roleJuridico = Role::where('name', 'ASISTENTE Y AUXILIAR ADMINISTRATIVO')->first();
            $user22->roles()->sync([$roleJuridico->id]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        // Asignar el rol 'JURIDICO' al usuario con ID 22
        try {
            $user22 = User::findOrFail(22);
            $roleJuridico = Role::where('name', 'JURIDICO')->first();
            $user22->roles()->sync([$roleJuridico->id]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        // diana cristina garcia catro
        try {
            $user22 = User::findOrFail(414);
            $roleJuridico = Role::where('name', 'ASISTENTE Y AUXILIAR ADMINISTRATIVO')->first();
            $user22->roles()->sync([$roleJuridico->id]);
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    
}
