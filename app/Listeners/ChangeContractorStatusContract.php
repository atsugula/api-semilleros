<?php

namespace App\Listeners;

use App\Models\Contractor;
use App\Events\ContractManagement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeContractorStatusContract implements ShouldQueue
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
    public function handle(ContractManagement $event)
    {
        $contract = $event->contract;        
        $contractors = Contractor::where('id', $contract->contractor_id)->get();

        foreach ($contractors as $contractor) {
            if ($contract->status == 1) {
                $contractor->status = 2;
            }
            else if ($contract->status == 4) {
                $contractor->status = 4;
            }
            $contractor->save();
        }
    }
}
