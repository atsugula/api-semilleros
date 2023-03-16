<?php

namespace App\Listeners;

use App\Models\Contractor;
use App\Events\ContractCancellation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeContractorStatusCancellation implements ShouldQueue
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
     * @param  \App\Events\ContractManagement  $event
     * @return void
     */
    public function handle(ContractCancellation $event)
    {
        $contract = $event->contract;        
        $contractors = Contractor::where('id', $contract->contractor_id)->get();

        foreach ($contractors as $contractor) {
            $contractor->status = 8;
            $contractor->reject_note = $contract->rejection_message;
            $contractor->save();
        }
    }
}
