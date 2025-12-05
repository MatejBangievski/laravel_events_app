@extends('layout')
@section('content')
    <h2>Edit Organizer</h2>
    <form action="{{ route('organizers.update', $organizer) }}" method="POST">
        @csrf
        @method('PUT')
        @include('organizers.form')
    </form>
@endsection
