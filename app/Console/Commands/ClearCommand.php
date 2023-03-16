<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class ClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:a';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpia cache, optimiza, revierte BD, ejecuta migraciónes y seeders';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // ensures that the progress bar is at 100%
        $pass = $this->output->createProgressBar(6);
        $this->info('Ya inicio el proceso espera poco...');
        $pass->start();
        $this->newLine();
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
        Artisan::call('migrate --seed');
        $this->info('Comando ejecutado php artisan migrate --seed');
        $this->info('..........................................');
        Artisan::call('optimize');
        $this->info('Comando ejecutado php artisan optimize');
        $this->info('..........................................');
        $pass->finish();
        return Command::SUCCESS;
    }
}
