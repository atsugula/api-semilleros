<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            /* SUPERVISOR DIRECTOR ADMINISTRATIVO */
            [
                'name' => 'USUARIO CONTROL TOTAL',
                'slug' => 'super.root',
                'description' => 'El todo poderoso',
                'full-access' => 'yes',
                'public' => 0,
            ],
            /* DIRECTOR ADMINISTRATIVO */
            [
                'name' => 'DIRECTOR ADMINISTRATIVO',
                'slug' => 'director_administrator',
                'description' => 'Director con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR SUBDIRECTOR */
            [
                'name' => 'DIRECTOR TECNICO',
                'slug' => 'director_tecnico',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR COORDINADORES Y METODOLOGOS */
            [
                'name' => 'SUBDIRECTOR TECNICO REGIONAL',
                'slug' => 'subdirector_tecnico',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR PSICOLOGOS */
            [
                'name' => 'COORDINADOR DE ENLACE',
                'slug' => 'coordinador_enlace',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            [
                'name' => 'COORDINADOR PSICOSOCIAL',
                'slug' => 'coordinador_psicosocial',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* ROLES SYSTEM */
            [
                'name' => 'DIRECTORA PROGRAMAS TRANSVERSALES',
                'slug' => 'director_programa',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'ASISTENTE Y AUXILIAR ADMINISTRATIVO',
                'slug' => 'asistente_administrativo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'COORDINADOR REGIONAL',
                'slug' => 'coordinador_regional',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'METODOLOGO',
                'slug' => 'metodologo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'PSICOSOCIAL',
                'slug' => 'psicologo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'MONITOR DEPORTIVO',
                'slug' => 'monitor',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'COORDINADOR MARITIMO',
                'slug' => 'coordinador_maritimo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
        ]);
    }
}
