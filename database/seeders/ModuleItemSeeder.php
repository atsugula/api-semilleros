<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleItemSeeder extends Seeder
{
    protected $settings = [
        ['Módulos', 'modules.index', 'albumsIcon'],
        ['Módulo item', 'items.index', 'albumsIcon'],
        ['Permisos', 'permissions.index', 'appsIcon'],
        ['Roles', 'roles.index', 'cogIcon'],
        ['Usuarios', 'users.index', 'accessibilityIcon'],
        ['Control de cambios en data', 'changeDataModels.index', 'accessibilityIcon'],

    ];

    protected $reports = [
        ['Reportes', 'reports.index', 'MinusIcon'],
    ];

    protected $administration = [
        ['Periodo Vigencia', 'validity.index', 'MinusIcon'],
        ['Contratistas usuarios', 'contractors.index', 'MinusIcon'],
        ['Enviar Emails', 'send-emails.index', 'MinusIcon'],
    ];

    protected $contracting = [
        ['Subir documentos', 'upload-documents.index', 'MinusIcon'],
    ];

    protected $juridical = [
        ['Listar contratistas', 'list-contractors.index', 'MinusIcon'],
        ['Contratos (PDF)', 'contracts.index', 'MinusIcon'],
    ];

    /*protected $juridical_admin = [
        ['Listar contratistas', 'list-contractors.index', 'MinusIcon'],
    ];*/

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Configuración
        foreach ($this->settings as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 1
                ],
            ]);
        }
        // Reportes
        foreach ($this->reports as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 3
                ],
            ]);
        }
        // Administration
        foreach ($this->administration as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 3
                ],
            ]);
        }
        // Contratista
        foreach ($this->contracting as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 3
                ],
            ]);
        }
        // Juridico
        foreach ($this->juridical as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 3
                ],
            ]);
        }
       /* // Juridico Admin
        foreach ($this->juridical_admin as $value) {
            DB::table('module_items')->insert([
                [
                    'name' => $value[0],
                    'route' => $value[1],
                    'icon' => $value[2],
                    'available' => 1,
                    'module_id' => 3
                ],
            ]);
        }*/
    }
}
