<?php

namespace App\Listeners;

use App\Models\Contractor;
use App\Models\Document;
use App\Events\ClausesFilleds;
use App\Models\Contract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeContractorStatusClauses implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ClausesFilleds  $event
     * @return void
     */
    public function handle(ClausesFilleds $event)
    {
        $clause = $event->clause;
        
        $contract = Contract::where('id', $clause->contract_id)->get()->first();
        $contractors = Contractor::where('id', $contract->contractor_id)->get();

        foreach ($contractors as $contractor) {
            $contractor->status = 2;
            $contractor->save();
        }
    }
}
