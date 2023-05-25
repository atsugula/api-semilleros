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
            'lastname' => 'ejemplo',
            'phone' => '12345678',
            'document_number' => '00000000000',
            'password' => Hash::make('root')
        ]);

        /* DIRECTOR ADMINISTRATIVOS */
        User::create([
            'name' => 'Director administrativo',
            'email' => 'director_administrator@ssiset.com',
            'lastname' => 'Director administrativo',
            'document_number' => '888888888',
            'password' => Hash::make('12345678')
        ]);

        /* DIRECTOR TECNICO */
        User::create([
            'name' => 'Director Tecnico',
            'email' => 'director_tecnico@ssiset.com',
            'lastname' => 'Director Tecnico',
            'document_number' => '79078098',
            'password' => Hash::make('12345678')
        ]);

        /* SUBDIRECTOR TECNICO */
        User::create([
            'name' => 'Subirector Tecnico',
            'email' => 'subdirector_tecnico@ssiset.com',
            'lastname' => 'Subirector Tecnico',
            'document_number' => '346345643656',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR ENLACE */
        User::create([
            'name' => 'Coordinador enlace',
            'email' => 'coordinador_enlace@ssiset.com',
            'lastname' => 'Subirector Tecnico',
            'document_number' => '658768647876',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR PSICOSOCIAL */
        User::create([
            'name' => 'Coordinador psicosocial',
            'email' => 'coordinador_psicosocial@ssiset.com',
            'lastname' => 'Coordinador psicosocial',
            'document_number' => '6789789997',
            'password' => Hash::make('12345678')
        ]);

        /* DIRECTOR TECNICO */
        User::create([
            'name' => 'Director programa',
            'email' => 'director_programa@ssiset.com',
            'lastname' => 'Director programa',
            'document_number' => '5678565678',
            'password' => Hash::make('12345678')
        ]);

        /* ASISTENTE ADMINISTRATIVO */
        User::create([
            'name' => 'Asistente administrativo',
            'email' => 'asistente_administrativo@ssiset.com',
            'lastname' => 'Asistente administrativo',
            'document_number' => '8567567765677',
            'password' => Hash::make('12345678')
        ]);

        /* COORDINADOR REGIONAL */
        User::create([
            'name' => 'Coordinador regional',
            'email' => 'coordinador_regional@ssiset.com',
            'lastname' => 'Coordinador regional',
            'document_number' => '6758678678',
            'password' => Hash::make('12345678')
        ]);

        /* METODOLOGO */
        User::create([
            'name' => 'Metodologo',
            'email' => 'metodologo@ssiset.com',
            'lastname' => 'Metodologo',
            'document_number' => '7869789789',
            'password' => Hash::make('12345678')
        ]);

        /* PSICOLOGO */
        User::create([
            'name' => 'Psicologo',
            'email' => 'psicologo@ssiset.com',
            'lastname' => 'Psicologo',
            'document_number' => '98777987',
            'password' => Hash::make('12345678')
        ]);

        /* MONITOR */
        User::create([
            'name' => 'Monitor',
            'email' => 'monitor@ssiset.com',
            'lastname' => 'Monitor',
            'document_number' => '69098089',
            'password' => Hash::make('12345678')
        ]);

                   
    }
}
