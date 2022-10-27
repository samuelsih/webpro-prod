<?php

namespace App\Listeners;

use App\Events\UserWantToPing;
use App\Models\User;
use App\Notifications\PingNotification;
use Illuminate\Support\Facades\Notification;

class SendPingListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserWantToPing $event)
    {
        $ping = $event->ping;
        $userToSend = User::where('id', $ping->to_id)->get();

        Notification::send($userToSend, new PingNotification($ping));
    }
}
