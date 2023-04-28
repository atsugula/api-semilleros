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

        /* COORDINADOR ENLACE */
        User::create([
            'name' => 'Coordinador enlace',
            'email' => 'coordinador_enlace@ssiset.com',
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

        /* ASISTENTE ADMINISTRATIVO */
        User::create([
            'name' => 'Asistente administrativo',
            'email' => 'asistente_administrativo@ssiset.com',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR REGIONAL */
        User::create([
            'name' => 'Coordinador regional',
            'email' => 'coordinador_regional@ssiset.com',
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
