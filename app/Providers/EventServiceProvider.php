<?php

namespace App\Providers;

use App\Events\ContractCancellation;
use App\Events\ContractManagement;
use App\Listeners\ChangeContractorStatusCancellation;
use App\Listeners\ChangeContractorStatusContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DocumentUpload::class => [
            ChangeContractorStatus::class,
        ],
        ContractManagement::class => [
            ChangeContractorStatusContract::class,
        ],
        ContractCancellation::class => [
            ChangeContractorStatusCancellation::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // User::observe(UserObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }


    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        //Monitor
        /*Binnacle::class =>[BinnacleObserver::class],
        Inscription::class =>[InscriptionObserver::class],
        Pec::class =>[PecObserver::class],
        Pedagogical::class =>[PedagogicalObserver::class],*/
        //Maganer
        /* DialogueTable::class=>[DialogueTableObserver::class],
        ManagerMonitoring::class=>[ManagerMonitoringObserver::class],
        MethodologicalInstructionModel::class =>[MethodologicalInstructionModelObserver::class], */
        //Psychosocial
        /* ParentSchool::class =>[ParentSchoolObserver::class],
        PsychopedagogicalLogbook::class =>[PsychopedagogicalLogbookObserver::class],
        PsychosocialInstruction::class =>[PsychosocialInstructionObserver::class] */
    ];
}
