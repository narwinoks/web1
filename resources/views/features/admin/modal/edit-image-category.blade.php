<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">Image Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-category-image">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="{{ $content->id }}">
        <input type="hidden" value="category-blog" name="key" id="key">
        <div class="mb-1 image" id="image">
            <label for="file" class="form-label">Image</label>
            <input type="file" class="form-control input-custom" aria-label="file" aria-describedby="basic-addon1"
                id="file" name="file" accept="image/*">
            <span class="error-file text-danger d-none"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
        <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
            <div class="spinner-border d-none mx-4" role="status">
            </div>
            <span class="mr-4" id="tag-button"> <i aria-disabled="true" class="fas fa-save"></i>
                Simpan</span>
        </button>
    </div>
</form>
