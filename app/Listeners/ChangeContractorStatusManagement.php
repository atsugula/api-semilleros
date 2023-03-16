<?php

namespace App\Listeners;

use App\Models\Contractor;
use App\Models\Document;
use App\Events\DocumentManagement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeContractorStatusManagement implements ShouldQueue
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
     * @param  \App\Events\DocumentManagement  $event
     * @return void
     */
    public function handle(DocumentManagement $event)
    {
        $doc = $event->document;
        $reject_note = $event->reject_note;

        $contractors = Contractor::where('id', $doc->contractor_id)->withCount(['documents'])->get();

        foreach ($contractors as $contractor) {
            if ($contractor->documents_count >= 18) {
                $documents_apr = Document::where([
                    ['contractor_id', $contractor->id],
                    ['status_id', 1]
                ])->count();

                $documents_rec = Document::where([
                    ['contractor_id', $contractor->id],
                    ['status_id', 4]
                ])->count();

                if ($documents_apr >= 21) {
                    $contractor->status = 6;
                    $contractor->reject_note = '';
                }
                else if ($documents_rec >= 1) {
                    $contractor->status = 4;
                    $contractor->reject_note = $reject_note;
                }
                else {
                    $contractor->status = 2;
                    $contractor->reject_note = '';
                }
            }
            $contractor->save();
        }
    }
}
