<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        /* SUPER - ROOT */
        User::create([
            'name' => 'Super admin',
            'email' => '5676797567',
            'password' => Hash::make('root')
        ]);

        /* ROOT */
        User::create([
            'name' => 'Admin',
            'email' => '5465468786',
            'password' => Hash::make('admin')
        ]);

        /* DIRECTOR ADMINISTRATIVOS */
        User::create([
            'name' => 'Director administrativo',
            'email' => 'director_administrator@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* DIRECTOR TECNICO */
        User::create([
            'name' => 'Director Tecnico',
            'email' => 'director_tecnico@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* SUBDIRECTOR TECNICO */
        User::create([
            'name' => 'Subirector Tecnico',
            'email' => 'subdirector_tecnico@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR PSICOSOCIAL */
        User::create([
            'name' => 'Coordinador psicosocial',
            'email' => 'coordinador_psicosocial@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* DIRECTOR TECNICO */
        User::create([
            'name' => 'Director programa',
            'email' => 'director_programa@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* CONTADOR GENERAL */
        User::create([
            'name' => 'Contador general',
            'email' => 'contador_general@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* ASISTENTE ADMINISTRATIVO */
        User::create([
            'name' => 'Asistente administrativo',
            'email' => 'asistente_administrativo@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* APOYO ADMINISTRATIVO */
        User::create([
            'name' => 'Apoyo administrativo',
            'email' => 'apoyo_administrativo@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* AUXILIAR ADMINISTRATIVO TECNICO */
        User::create([
            'name' => 'Auxiliar administrativo tecnico',
            'email' => 'auxiliar_administrativo_tecnico@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* APOYO JURIDICO */
        User::create([
            'name' => 'Apoyo juridico',
            'email' => 'apoyo_juridico@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* PERIODISTA */
        User::create([
            'name' => 'Periodista',
            'email' => 'periodista@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* MENSAJERO */
        User::create([
            'name' => 'Mensajero',
            'email' => 'mensajero@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR REGIONAL */
        User::create([
            'name' => 'Coordinador regional',
            'email' => 'coordinador_regional@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR ZONA MARITIMA */
        User::create([
            'name' => 'Coordinador zona maritima',
            'email' => 'coordinador_zona_maritima@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* METODOLOGO */
        User::create([
            'name' => 'Metodologo',
            'email' => 'metodologo@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* PSICOLOGO */
        User::create([
            'name' => 'Psicologo',
            'email' => 'psicologo@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* MONITOR */
        User::create([
            'name' => 'Monitor',
            'email' => 'monitor@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

    }
}
