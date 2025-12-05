@extends('layout')
@section('content')
    <h2>Create Organizer</h2>
    <form action="{{ route('organizers.store') }}" method="POST">
        @csrf
        @include('organizers.form')
    </form>
@endsection
