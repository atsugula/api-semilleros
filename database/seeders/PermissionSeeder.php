<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super administrador
        $this->setPermissions('permissions', 'Permisos');
        $this->setPermissions('roles', 'Roles');
        $this->setPermissions('users', 'Usuarios');
        $this->setPermissions('modules', 'Modulos');
    }

    public function setPermissions($prefix, $nameRoute)
    {
        $actionRoute = [
            'index',
            'store',
            'create',
            'edit',
            'show',
            'destroy'
        ];
        foreach ($actionRoute as $action) {
            DB::table('permissions')->insert([
                'name' => $action . ' ' . $nameRoute,
                'slug' => $prefix . '.' . $action,
                'description' => 'User can ' . $action . ' ' . $nameRoute,
                'controller' => rtrim($prefix, 's')
            ]);
        }
    }
}
