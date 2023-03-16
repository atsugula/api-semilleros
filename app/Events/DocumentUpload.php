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

class DocumentUpload
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The document instance.
     *
     * @var \App\Models\Document
     */
    public $document;
 
    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Document  $document
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }
}
