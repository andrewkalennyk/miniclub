<?php

namespace App\Mail;

use App\Events\EventCreated;
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
        $eventData = $event->eventData;

        $users = User::all();

        foreach ($users as $user) {
            if (!empty($user->email)) {
                Mail::send('emails.event-created', ['eventData' => $eventData], function ($message) use ($user) {
                    $message->to($user->email)->subject('Новий івент запропоновано');
                });
            }
        }
    }

}
