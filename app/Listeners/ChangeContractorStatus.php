<?php

namespace App\Listeners;

use App\Models\Contractor;
use App\Models\Document;
use App\Events\DocumentUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeContractorStatus implements ShouldQueue
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
     * @param  \App\Events\DocumentUpload  $event
     * @return void
     */
    public function handle(DocumentUpload $event)
    {
        $doc = $event->document;

        $contractors = Contractor::where('id', $doc->contractor_id)->withCount(['documents'])->get();

        foreach ($contractors as $contractor) {
            if ($contractor->documents_count >= 21) {
                $contractor->status = 2;
            }
            else {
                $contractor->status = 5;
            }

            $contractor->save();
        }
    }
}
