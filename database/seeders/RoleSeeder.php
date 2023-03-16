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
                'name' => 'Gerente RECREAVELLE',
                'slug' => 'super.root',
                'description' => 'El todo poderoso',
                'full-access' => 'yes',
                'public' => 0,
            ],
            /* SUPERVISOR GENERAL */
            [
                'name' => 'Director Administrativo',
                'slug' => 'root',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR SUBDIRECTOR */
            [
                'name' => 'Director Técnico',
                'slug' => 'director_tecnico',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR COORDINADORES Y METODOLOGOS */
            [
                'name' => 'Subdirector Técnico',
                'slug' => 'subdirector_tecnico',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* SUPERVISOR PSICOLOGOS */
            [
                'name' => 'Coordinador Psicosocial',
                'slug' => 'coordinador_psicosocial',
                'description' => 'Supervisor con funciones basicas',
                'full-access' => 'no',
                'public' => 0,
            ],
            /* ROLES SYSTEM */
            [
                'name' => 'Directora Programa Transversales',
                'slug' => 'director_programa',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Contadora General',
                'slug' => 'contador_general',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Asistentes Administrativos',
                'slug' => 'asistente_administrativo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Apoyo Administrativos',
                'slug' => 'apoyo_administrativo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Auxiliares Administrativos y Técnicos',
                'slug' => 'auxiliar_administrativo_tecnico',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Apoyo Jurídico',
                'slug' => 'apoyo_juridico',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Periodistas',
                'slug' => 'periodista',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Mensajeros',
                'slug' => 'mensajero',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Coordinadores regionales',
                'slug' => 'coordinador_regional',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Coordinador Zona Marítima ',
                'slug' => 'coordinador_zona_maritima',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Metodologos',
                'slug' => 'metodologo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Psicólogos',
                'slug' => 'psicologo',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
            [
                'name' => 'Monitor',
                'slug' => 'monitor',
                'description' => 'Acceso a funciones básicas',
                'full-access' => 'no',
                'public' => 1,
            ],
        ]);
    }
}
