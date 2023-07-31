<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class devDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DB:RealData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'database migration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pass = $this->output->createProgressBar(6);
        $this->info('Ya inicio el proceso espera poco...');
        $pass->start();
        $this->newLine();
        Artisan::call('config:clear');
        Artisan::call('config:clear');
        $this->info('Comando ejecutado php artisan config:clear');
        $this->info('..........................................');
        Artisan::call('config:cache');
        $this->info('Comando ejecutado php artisan config:cache');
        $this->info('..........................................');
        Artisan::call('cache:clear');
        $this->info('Comando ejecutado php artisan cache:clear');
        $this->info('..........................................');
        Artisan::call('route:clear');
        $this->info('Comando ejecutado php artisan route:clear');
        $this->info('..........................................');
        $this->info('Los siguientes procesos demoran un poco, por favor espera...');
        $this->info('..........................................');
        Artisan::call('migrate:fresh');
        $this->info('Comando ejecutado php artisan migrate:fresh');
        $this->info('..........................................');
        Artisan::call('db:seed --class=ZoneTableSeeder');
        Artisan::call('db:seed --class=UsersTableSeeder');
        Artisan::call('db:seed --class=ModuleSeeder');
        Artisan::call('db:seed --class=ModuleItemSeeder');
        Artisan::call('db:seed --class=RolesTableSeeder');
        Artisan::call('db:seed --class=PermissionSeeder');
        Artisan::call('db:seed --class=RolesUsersTableSeeder');
        Artisan::call('db:seed --class=GroupSeeder');
        Artisan::call('db:seed --class=PermissionRoleSeeder');
        Artisan::call('db:seed --class=ValidityPeriodsSeeder');
        Artisan::call('db:seed --class=ProfileSeeder');
        Artisan::call('db:seed --class=DepartmentsSeeder');
        Artisan::call('db:seed --class=CitySeeder');
        Artisan::call('db:seed --class=StatusSeeder');
       // Artisan::call('db:seed --class=BankAccountTypeSeeder');
        Artisan::call('db:seed --class=MunicipalitiesTableSeeder');
        Artisan::call('db:seed --class=ObjectSeeder');
        Artisan::call('db:seed --class=DisciplinesTableSeeder');
        Artisan::call('db:seed --class=DisciplinesUsersTableSeeder');
        Artisan::call('db:seed --class=DirectionSeeder');
        Artisan::call('db:seed --class=ZoneUserTableSeeder');
        Artisan::call('db:seed --class=EthnicitySeeder');
        Artisan::call('db:seed --class=EventSupportSeederer');
        Artisan::call('db:seed --class=EvaluationSeeder');
        Artisan::call('db:seed --class=MonthsSeeder');
        Artisan::call('db:seed --class=MethodologistVisitPersonalizedSeeder');
        Artisan::call('db:seed --class=CoordinatorVisitSeeder');
        Artisan::call('db:seed --class=SidewalkSeeder');
        Artisan::call('db:seed --class=Health_Entities_Seeder');
        Artisan::call('db:seed --class=RolesActivitiesSeeder');
        Artisan::call('db:seed --class=RolesObjectsActivitiesSeeder');
        Artisan::call('db:seed --class=UpdateRolesSeeder');
        Artisan::call('db:seed --class=AssignRolesSeeder');
        Artisan::call('db:seed --class=UpdateMunicipalitiesSeeder');

        $this->info('..........................................');
        Artisan::call('optimize');
        $this->info('Comando ejecutado php artisan optimize');
        $this->info('..........................................');
        $pass->finish();
        return Command::SUCCESS;

    }
}
