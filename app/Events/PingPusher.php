<?php

namespace App\Events;

use App\Models\Ping;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PingPusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $ping;

    public function __construct(Ping $ping)
    {
        $this->ping = [
            'id' => $ping->id,
            'from_name' => $ping->from->name,
            'from_id' => $ping->from->id,
            'to_name' => $ping->to->name,
            'to_id' => $ping->to->id,
            'message' => $ping->message,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('messages.'.$this->ping['id']);
    }
}
