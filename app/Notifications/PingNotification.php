<?php

namespace App\Notifications;

use App\Models\Ping;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ping $ping)
    {
        $this->ping = $ping;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'from_name' => $this->ping->from->name,
            'from_id' => $this->ping->from->id,
            'to_name' => $this->ping->to->name,
            'to_id' => $this->ping->to->id,
            'message' => $this->ping->message,
        ];
    }
}
