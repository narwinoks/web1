<form id="form-update-password">
    @csrf
    <input type="hidden" name="key" value="password">
    <div class="form-group mb-1">
        <label for="newPassword">New Password</label>
        <input type="password" class="form-control is-rounded" id="newPassword" name="password"
            placeholder="Enter new password">
    </div>
    <div class="form-group mb-1">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmationPassword" class="form-control is-rounded" id="confirmPassword"
            placeholder="Confirm new password">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="btn-save-password">Save</button>
    </div>
</form>
