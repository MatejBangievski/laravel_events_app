<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\Organizer;

class EventController extends Controller
{
    public function index()
    {
//        $events = Event::with('organizer')->paginate(5);
//        return view('events.index', compact('events'));
        $search = request('search');

        $events = Event::with('organizer')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('events.index', compact('events', 'search'));
    }

    public function create()
    {
        $organizers = Organizer::all();
        return view('events.create', compact('organizers'));
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());
//        return redirect()->route('events.index')->with('success', 'Настанот е успешно креиран.');
        return redirect()->route('events.index');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $organizers = Organizer::all();
        return view('events.edit', compact('event', 'organizers'));
    }

    public function update(StoreEventRequest $request, Event $event)
    {
        $event->update($request->validated());
//        return redirect()->route('events.index')->with('success', 'Настанот е успешно ажуриран.');
        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
//        return redirect()->route('events.index')->with('success', 'Настанот е избришан.');
        return redirect()->route('events.index');
    }
}
