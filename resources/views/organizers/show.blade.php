@extends('layout')
@section('content')
    <h2>{{ $organizer->full_name }}</h2>
    <p>Email: {{ $organizer->email }}</p>
    <p>Phone: {{ $organizer->phone }}</p>
    <hr>
    <h4>Events by this Organizer:</h4>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }} - {{ $event->type }}</li>
        @endforeach
    </ul>

    {{ $events->links() }}
@endsection
