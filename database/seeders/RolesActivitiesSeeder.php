<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_objects = [
            [
                'description' => "DIRECTOR ADMINISTRATIVO",
                'object' => "Prestación de servicios profesionales como Director Administrativo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "DIRECTOR TECNICO",
                'object' => "Prestación de servicios profesionales como Director Técnico en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "DIRECTOR PROGRAMAS TRANSVERSALES",
                'object' => "Prestación de servicios como Director de Programas Transversales en el marco del proyecto semilleros deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "SUBDIRECTOR TECNICO REGIONAL",
                'object' => "Prestación de servicios como Subdirector Técnico Regional en el marco del proyecto semilleros deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "COORDINADOR PSICOSOCIAL",
                'object' => "Prestación de servicios profesionales como Coordinador Psicosocial en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "COORDINADOR REGIONAL",
                'object' => "Prestación de servicios como Coordinador Regional en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "COORDINADOR ZONA MARITIMA",
                'object' => "Prestación de servicios como Coordinador Zona Marítima en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "PSICOLOGOS",
                'object' => "Prestación de servicios profesionales como Psicólogo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "METODOLOGO",
                'object' => "Prestación de servicios como Metodólogo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "MONITOR DEPORTIVO",
                'object' => "Prestación de servicios como Monitor Deportivo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "CONTADOR GENERAL",
                'object' => "Prestación de servicios profesionales como Contador General del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "APOYO JURIDICO",
                'object' => "Prestación de servicios profesionales como Apoyo jurídico en el  marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "ASISTENTE ADMINISTRATIVO",
                'object' => "Prestación de servicios como Asistente Administrativo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "APOYO ADMINISTRATIVO",
                'object' => "Prestación de servicios como Apoyo Administrativo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "PERIODISTA",
                'object' => "Prestación de servicios como Periodista en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "PERIODISTA DE APOYO",
                'object' => "Prestación de servicios como Periodista de apoyo en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "AUXILIAR ADMINISTRATIVO Y TECNICO",
                'object' => "Prestación de servicios como Auxiliar Administrativo y Técnico en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => "MENSAJERO",
                'object' => "Prestación de servicios como mensajero en el marco del proyecto Semilleros Deportivos.",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('roles_activities')->insert($roles_objects);
    }
}
