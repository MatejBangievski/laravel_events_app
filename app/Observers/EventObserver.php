<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        session()->flash('info', "Нов настан е додаден: {$event->name} ({$event->date})");

        Log::info("Event created: id={$event->id}, name={$event->name}, date={$event->date}");
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        $changes = $event->getChanges();

        Log::info('Event updated', [
            'id' => $event->id,
            'changes' => $changes,
        ]);
    }


    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        Log::info("Event canceled (deleted): id={$event->id}, name={$event->name}, date={$event->date}");
    }

}
