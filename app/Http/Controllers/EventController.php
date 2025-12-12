<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\OrganizerRepositoryInterface;

class EventController extends Controller
{
    protected EventRepositoryInterface $eventRepository;
    protected OrganizerRepositoryInterface $organizerRepository;

    public function __construct(
        EventRepositoryInterface $eventRepository,
        OrganizerRepositoryInterface $organizerRepository
    ) {
        $this->eventRepository = $eventRepository;
        $this->organizerRepository = $organizerRepository;
    }

    public function index()
    {
        $search = request('search');

        $events = $this->eventRepository->queryWithOrganizer($search);

        return view('events.index', compact('events', 'search'));
    }

    public function create()
    {
        $organizers = $this->organizerRepository->all();
        return view('events.create', compact('organizers'));
    }

    public function store(StoreEventRequest $request)
    {
        $this->eventRepository->create($request->validated());

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = $this->eventRepository->find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = $this->eventRepository->find($id);
        $organizers = $this->organizerRepository->all();

        return view('events.edit', compact('event', 'organizers'));
    }

    public function update(StoreEventRequest $request, $id)
    {
        $event = $this->eventRepository->find($id);
        $this->eventRepository->update($event, $request->validated());

        return redirect()->route('events.index');
    }

    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);
        $this->eventRepository->delete($event);

        return redirect()->route('events.index');
    }
}
