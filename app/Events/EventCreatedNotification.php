<?php

namespace App\Events;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventCreatedNotification
{
    use Dispatchable, SerializesModels;

    public $eventData;

    public function __construct($eventData)
    {
        $this->eventData = $eventData;
    }
}
