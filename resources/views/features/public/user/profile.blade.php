<form enctype="multipart/form-data" id="form-update-profile">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
    <input type="hidden" name="key" value="profile">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control is-rounded" id="name" name="name" value="{{ $user->name }}"
            placeholder="Enter your name">
        <span class="error-name text-danger d-none"></span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control is-rounded" id="email" value="{{ $user->email }}" readonly
            placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control is-rounded" name="phone" id="phone" value="{{ $user->phone }}"
            placeholder="Enter your phone number">
    </div>
    <div class="form-group">
        <label for="phone">Desription</label>
        <textarea name="description" id="description" class="form-control is-rounded" rows="3">{{ $user->description }}</textarea>

    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" name="image" id="formFile">
        <span class="error-profile text-danger d-none"></span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="btn-update-profile">Save</button>
    </div>
</form>
