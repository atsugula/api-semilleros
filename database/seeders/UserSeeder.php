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

        // Super - root
        User::create([
            'name' => 'Super admin',
            'email' => '5676797567',
            'password' => Hash::make('root')
        ]);

        // Root
        User::create([
            'name' => 'Admin',
            'email' => '5465468786',
            'password' => Hash::make('admin')
        ]);

        // ASISTENTES Y AUXILIARES ADMINISTRATIVOS
        User::create([
            'name' => 'auxiliar1',
            'email' => 'auxiliar1@gmail.com',
            'password' => Hash::make('38567996')
        ]);

        User::create([
            'name' => 'auxiliar2',
            'email' => 'auxiliar2@gmail.com',
            'password' => Hash::make('1112489267')
        ]);

        User::create([
            'name' => 'auxiliar3',
            'email' => 'auxiliar3@gmail.com',
            'password' => Hash::make('94417713')
        ]);

        User::create([
            'name' => 'auxiliar4',
            'email' => 'auxiliar4@gmail.com',
            'password' => Hash::make('29233976')
        ]);

        User::create([
            'name' => 'auxiliar5',
            'email' => 'auxiliar5@gmail.com',
            'password' => Hash::make('31902881')
        ]);

        User::create([
            'name' => 'auxiliar6',
            'email' => 'auxiliar6@gmail.com',
            'password' => Hash::make('1107092803')
        ]);

        User::create([
            'name' => 'auxiliar7',
            'email' => 'auxiliar7@gmail.com',
            'password' => Hash::make('1005368219')
        ]);

        User::create([
            'name' => 'auxiliar8',
            'email' => 'auxiliar8@hotmail.com',
            'password' => Hash::make('1136059849'),
        ]);

        //JURIDICOS
        User::create([
            'name' => 'juridico1',
            'email' => 'juridico1@gmail.com',
            'password' => Hash::make('3854799')
        ]);

        User::create([
            'name' => 'juridico2',
            'email' => 'juridico2@gmail.com',
            'password' => Hash::make('111248')
        ]);

        User::create([
            'name' => 'juridico3',
            'email' => 'juridico3@gmail.com',
            'password' => Hash::make('77417713')
        ]);

        User::create([
            'name' => 'juridico4',
            'email' => 'juridico4@gmail.com',
            'password' => Hash::make('1233976')
        ]);

        User::create([
            'name' => 'juridico5',
            'email' => 'juridico5@gmail.com',
            'password' => Hash::make('9875214')
        ]);

        User::create([
            'name' => 'juridico6',
            'email' => 'juridico6@gmail.com',
            'password' => Hash::make('9654123')
        ]);

        User::create([
            'name' => 'juridico7',
            'email' => 'juridico7@gmail.com',
            'password' => Hash::make('145711110')
        ]);

        User::create([
            'name' => 'juridico8',
            'email' => 'juridico8@hotmail.com',
            'password' => Hash::make('963145'),
        ]);

        //SUPERVISORES
        User::create([
            'name' => 'supervisor1',
            'email' => 'supervisor1@hotmail.com',
            'password' => Hash::make('10963145'),
        ]);

        User::create([
            'name' => 'supervisor2',
            'email' => 'supervisor2@hotmail.com',
            'password' => Hash::make('22963141'),
        ]);

        User::create([
            'name' => 'supervisor3',
            'email' => 'supervisor3@hotmail.com',
            'password' => Hash::make('50963145'),
        ]);

        User::create([
            'name' => 'supervisor4',
            'email' => 'supervisor4@hotmail.com',
            'password' => Hash::make('85963145'),
        ]);

        User::create([
            'name' => 'supervisor5',
            'email' => 'supervisor5@hotmail.com',
            'password' => Hash::make('8500145'),
        ]);

        User::create([
            'name' => 'supervisor6',
            'email' => 'supervisor6@hotmail.com',
            'password' => Hash::make('00963145'),
        ]);

        User::create([
            'name' => 'supervisor7',
            'email' => 'supervidor7@hotmail.com',
            'password' => Hash::make('12500145'),
        ]);

        User::create([
            'name' => 'supervisor8',
            'email' => 'supervidor8@hotmail.com',
            'password' => Hash::make('88500145'),
        ]);

        //COORDINADOR REGIONAL
        User::create([
            'name' => 'coodinador regional1',
            'email' => 'coordinador1@hotmail.com',
            'password' => Hash::make('8800145'),
        ]);

        User::create([
            'name' => 'coodinador regional2',
            'email' => 'coordinador2@hotmail.com',
            'password' => Hash::make('178500145'),
        ]);

        User::create([
            'name' => 'coodinador regional3',
            'email' => 'coordinador3@hotmail.com',
            'password' => Hash::make('9900145'),
        ]);

        User::create([
            'name' => 'coodinador regional4',
            'email' => 'coordinador4@hotmail.com',
            'password' => Hash::make('2588500145'),
        ]);

        User::create([
            'name' => 'coodinador regional5',
            'email' => 'coordinador5@hotmail.com',
            'password' => Hash::make('008500145'),
        ]);

        User::create([
            'name' => 'coodinador regional6',
            'email' => 'coordinador6@hotmail.com',
            'password' => Hash::make('608500145'),
        ]);

        User::create([
            'name' => 'coodinador regional7',
            'email' => 'coordinador7@hotmail.com',
            'password' => Hash::make('88905'),
        ]);

        User::create([
            'name' => 'coodinador regional8',
            'email' => 'coordinador8@hotmail.com',
            'password' => Hash::make('123688905'),
        ]);

      /*  User::create([
            'name' => 'KATHERINE MARTINEZ SANDOVAL',
            'email' => 'semilleroskathe@gmail.com',
            'password' => Hash::make('38567996')
        ]);

        User::create([
            'name' => 'CINDY JOHANNA FLOREZ UPARELA',
            'email' => 'florezuparela18@gmail.com',
            'password' => Hash::make('1112489267')
        ]);

        User::create([
            'name' => 'JUAN MAURICIO DINAS RODRIGUEZ',
            'email' => 'mao.dinas@gmail.com',
            'password' => Hash::make('94417713')
        ]);

        User::create([
            'name' => 'DIANA CRISTINA GARCIA CASTRO',
            'email' => 'dianacristinagarciacastro@gmail.com',
            'password' => Hash::make('29233976')
        ]);

        User::create([
            'name' => 'MARTHA LUCIA GONZALEZ',
            'email' => 'martaluciag23@gmail.com',
            'password' => Hash::make('31902881')
        ]);

        User::create([
            'name' => 'TOMAS  MENDEZ ORTIZ',
            'email' => 'region6semilleros@gmail.com',
            'password' => Hash::make('1107092803')
        ]);

        User::create([
            'name' => 'NATALIA TIRADO CAMACHO',
            'email' => 'nataliacamacho0926@gmail.com',
            'password' => Hash::make('1005368219')
        ]);

        User::create([
            'name' => 'LITZA ANDREA CIFUENTES GOMEZ',
            'email' => 'litzandreacg@hotmail.com',
            'password' => Hash::make('1136059849'),
        ]);*/


        /*  DB::table('users')->insert([
            // Super - root
            [
                'name' => 'Super admin',
                'email' => '5676797567',
                'password' => Hash::make('root')
            ],
            // Root
            [
                'name' => 'Admin',
                'email' => '5465468786',
                'password' => Hash::make('admin')
            ],
            // ASISTENTES Y AUXILIARES ADMINISTRATIVOS
            [
                'name' => 'KATHERINE MARTINEZ SANDOVAL',
                'email' => 'semilleroskathe@gmail.com',
                'password' => Hash::make('38567996')
            ],
            [
                'name' => 'CINDY JOHANNA FLOREZ UPARELA',
                'email' => 'florezuparela18@gmail.com',
                'password' => Hash::make('1112489267')
            ],
            [
                'name' => 'JUAN MAURICIO DINAS RODRIGUEZ',
                'email' => 'mao.dinas@gmail.com',
                'password' => Hash::make('94417713')
            ],
            [
                'name' => 'DIANA CRISTINA GARCIA CASTRO',
                'email' => 'dianacristinagarciacastro@gmail.com',
                'password' => Hash::make('29233976')
            ],
            [
                'name' => 'MARTHA LUCIA GONZALEZ',
                'email' => 'martaluciag23@gmail.com',
                'password' => Hash::make('31902881')
            ],
            [
                'name' => 'TOMAS  MENDEZ ORTIZ',
                'email' => 'region6semilleros@gmail.com',
                'password' => Hash::make('1107092803')
            ],
            [
                'name' => 'NATALIA TIRADO CAMACHO',
                'email' => 'nataliacamacho0926@gmail.com',
                'password' => Hash::make('1005368219')
            ],
            [
                'name' => 'LITZA ANDREA CIFUENTES GOMEZ',
                'email' => 'litzandreacg@hotmail.com',
                'password' => Hash::make('1136059849')
            ],
        ]);*/
    }
}
