@extends('layout')
@section('content')
    <h2>Organizers</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-3">Add Organizer</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        @foreach($organizers as $organizer)
            <tr>
                <td>{{ $organizer->id }}</td>
                <td>{{ $organizer->full_name }}</td>
                <td>{{ $organizer->email }}</td>
                <td>{{ $organizer->phone }}</td>
                <td>
                    <a href="{{ route('organizers.show', $organizer) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('organizers.edit', $organizer) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('organizers.destroy', $organizer) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $organizers->links() }}
@endsection
