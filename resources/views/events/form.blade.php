<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $event->name ?? '') }}">
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $event->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Type</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $event->type ?? '') }}">
</div>
<div class="mb-3">
    <label>Date</label>
    <input type="date" name="date" class="form-control"
           value="{{ old('date', $event->date ?? '') }}">
</div>
<div class="mb-3">
    <label>Organizer</label>
    <select name="organizer_id" class="form-control">
        @foreach($organizers as $organizer)
            <option value="{{ $organizer->id }}" {{ old('organizer_id', $event->organizer_id ?? '') == $organizer->id ? 'selected' : '' }}>
                {{ $organizer->full_name }}
            </option>
        @endforeach
    </select>
</div>
<button class="btn btn-success">Save</button>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
