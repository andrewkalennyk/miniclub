<?php

namespace App\Mail;

use App\Events\EventCreatedNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendEventNotification
{
    public function handle(EventCreatedNotification $event)
    {
        $eventData = $event->eventData;
        $users = User::where('admin_apply_email', 1)->get();

        foreach ($users as $user) {
            if (!empty($user->email)) {
                Mail::send('emails.event-created', ['eventData' => $eventData], function ($message) use ($user) {
                    $message->to($user->email)->subject('Новий івент запропоновано');
                });
            }
        }
    }
}
