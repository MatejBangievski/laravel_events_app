@extends('layout')
@section('content')
    <h2>{{ $event->name }}</h2>
    <p>Type: {{ $event->type }}</p>
    <p>Description: {{ $event->description }}</p>
    <p>Organizer: {{ $event->organizer->full_name }}</p>
@endsection
