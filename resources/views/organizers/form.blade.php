<div class="mb-3">
    <label>Full Name</label>
    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $organizer->full_name ?? '') }}">
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $organizer->email ?? '') }}">
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $organizer->phone ?? '') }}">
</div>
<button class="btn btn-success">Save</button>
