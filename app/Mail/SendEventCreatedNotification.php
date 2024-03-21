<?php

namespace App\Mail;

use App\Events\EventCreated;
use App\Events\EventCreatedNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendEventCreatedNotification
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventCreated  $event
     * @return void
     */
    public function handle(EventCreated $event)
    {
        event(new EventCreatedNotification($event->eventData));
    }

}
