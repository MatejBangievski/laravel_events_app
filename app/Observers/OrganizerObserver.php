<?php

namespace App\Observers;

use App\Models\Organizer;
use Illuminate\Support\Facades\Log;

class OrganizerObserver
{
    /**
     * Handle the Organizer "created" event.
     */
    public function created(Organizer $organizer): void
    {
        session()->flash('info', "Нов организатор е креиран: {$organizer->full_name} ({$organizer->email})");
        Log::info("Organizer created: id={$organizer->id}, name={$organizer->full_name}");
    }

    /**
     * Handle the Organizer "updated" event.
     */
    public function updated(Organizer $organizer): void
    {
        $changes = $organizer->getChanges();
        Log::info('Organizer updated', [
            'id' => $organizer->id,
            'changes' => $changes,
        ]);
    }

    /**
     * Handle the Organizer "deleted" event.
     */
    public function deleted(Organizer $organizer): void
    {
        Log::info("Organizer deleted: id={$organizer->id}, name={$organizer->full_name}");
    }
}
