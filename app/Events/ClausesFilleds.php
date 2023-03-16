<?php

namespace App\Events;

use App\Models\Clause;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClausesFilleds
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The clause instance.
     *
     * @var \App\Models\Clause
     */
    public $clause;
 
    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Clause  $clause
     * @return void
     */
    public function __construct(Clause $clause)
    {
        $this->clause = $clause;
    }
}
