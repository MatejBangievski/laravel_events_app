<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    public function all(): Collection
    {
        return Event::all();
    }

    public function find(int $id): Event
    {
        return Event::query()->findOrFail($id);
    }

    public function create(array $data): Event
    {
        return Event::query()->create($data);
    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);

        return $event;

    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    public function queryWithOrganizer(?string $search)
    {
        return Event::with('organizer')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->appends(['search' => $search]);
    }

}
