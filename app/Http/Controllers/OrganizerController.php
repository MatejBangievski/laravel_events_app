<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizerRequest;
use App\Models\Organizer;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::paginate(5);
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(StoreOrganizerRequest $request)
    {
        Organizer::create($request->validated());
//        return redirect()->route('organizers.index')->with('success', 'Организаторот е успешно креиран.');
        return redirect()->route('organizers.index');
    }

    public function show(Organizer $organizer)
    {
        $events = $organizer->events()->paginate(10);
        return view('organizers.show', compact('organizer', 'events'));
    }

    public function edit(Organizer $organizer)
    {
        return view('organizers.edit', compact('organizer'));
    }

    public function update(StoreOrganizerRequest $request, Organizer $organizer)
    {
        $organizer->update($request->validated());
//        return redirect()->route('organizers.index')->with('success', 'Организаторот е успешно ажуриран.');
        return redirect()->route('organizers.index');
    }

    public function destroy(Organizer $organizer)
    {
        $organizer->delete();
//        return redirect()->route('organizers.index')->with('success', 'Организаторот е избришан.');
        return redirect()->route('organizers.index');
    }
}
