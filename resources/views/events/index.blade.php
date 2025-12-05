@extends('layout')
@section('content')
    <h2>Events</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add Event</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Organizer</th>
            <th>Actions</th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->type }}</td>
                <td>{{ $event->organizer->full_name }}</td>
                <td>
                    <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $events->links() }}
@endsection
