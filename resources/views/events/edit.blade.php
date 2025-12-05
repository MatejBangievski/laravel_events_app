@extends('layout')
@section('content')
    <h2>Edit Event</h2>
    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        @include('events.form')
    </form>
@endsection
