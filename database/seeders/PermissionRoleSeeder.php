<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [1, 2, 3, 4, 5, 6];
        $dashboard = Permission::latest('id')->first()->id;

        //Dasboard
        foreach ($roles  as  $value) {
            PermissionRole::create([
                'role_id' => $value,
                'permission_id' => $dashboard
            ]);
        }

        //Asignación de modulos a roles.
        $modules = [1, 2, 3, 4, 5, 6, 7, 8];
        //Admin
        $rolAdminPermissionsAssign = [
            'reports',
            'dashboard'
        ];

        $roles_permission_send = [1,2];
        foreach ($roles_permission_send as $value) {
            PermissionRole::create([
                'role_id' =>  $value,
                'permission_id' => $modules[5]
            ]);
        }

        foreach ($modules as $value) {

            PermissionRole::create([
                'role_id' => $roles[1],
                'permission_id' => $value

            ]);
        }
        foreach ($rolAdminPermissionsAssign as $value) {
            $permissions = Permission::select('id')->where('slug', 'LIKE', '%' . $value . '%')->get();
            foreach ($permissions  as  $value) {

                PermissionRole::create([
                    'role_id' => $roles[0],
                    'permission_id' => $value->id

                ]);
            }
        }
    }
}
