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

            // Buscar usuarios por IDs
            $users = User::whereIn('id', [24, 22])->get();
    
            // Obtener roles por nombres
            $roles = Role::whereIn('name', ['CONTABILIDAD', 'JURIDICO'])->get();
    
            // Asignar roles a los usuarios
            foreach ($users as $user) {
                foreach ($roles as $role) {
                    $user->roles()->attach($role);
                }
            }
        }
    
}
