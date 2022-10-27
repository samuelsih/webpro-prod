<?php

use App\Models\Ping;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('pings.{to_id}', function ($user, $to_id) {
    return (int) $user->id === Ping::find($to_id)->to_id;
});
