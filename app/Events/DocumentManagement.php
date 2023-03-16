<?php

namespace App\Events;

use App\Models\Document;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DocumentManagement
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The document instance.
     *
     * @var \App\Models\Document
     */
    public $document;

    /**
     * The reject note instance
     */
    public $reject_note;
 
    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Document  $document
     * @param $reject_note
     * @return void
     */
    public function __construct(Document $document, $reject_note)
    {
        $this->document = $document;
        $this->reject_note = $reject_note;
    }
}
