@extends('layout')
@section('content')
    <h2>Create Event</h2>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        @include('events.form')
    </form>
@endsection
