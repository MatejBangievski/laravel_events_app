<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizerRequest;
use App\Repositories\OrganizerRepositoryInterface;


class OrganizerController extends Controller
{
    protected OrganizerRepositoryInterface $organizerRepository;

    public function __construct(OrganizerRepositoryInterface $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }

    public function index()
    {
        $organizers = $this->organizerRepository->paginate();
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(StoreOrganizerRequest $request)
    {
        $this->organizerRepository->create($request->validated());

        return redirect()->route('organizers.index');
    }

    public function show($id)
    {
        $organizer = $this->organizerRepository->find($id);
        $events = $organizer->events()->paginate(10);

        return view('organizers.show', compact('organizer', 'events'));
    }

    public function edit($id)
    {
        $organizer = $this->organizerRepository->find($id);
        return view('organizers.edit', compact('organizer'));
    }

    public function update(StoreOrganizerRequest $request, $id)
    {
        $organizer = $this->organizerRepository->find($id);
        $this->organizerRepository->update($organizer, $request->validated());

        return redirect()->route('organizers.index');
    }

    public function destroy($id)
    {
        $organizer = $this->organizerRepository->find($id);
        $this->organizerRepository->delete($organizer);

        return redirect()->route('organizers.index');
    }
}
