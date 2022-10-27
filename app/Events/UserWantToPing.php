<?php

namespace App\Events;

use App\Models\Ping;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserWantToPing implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ping;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ping $ping)
    {
        $this->ping = $ping;
    }

    public function broadcastOn()
    {
        return new Channel('messages');
    }
}
