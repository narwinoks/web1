<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">Story</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-story">
    @csrf
    <div class="modal-body">
        <input type="hidden" value="story" name="key" id="key">
        <div class="mb-1">
            <label for="type" class="form-label">Tipe</label>
            <select id="type" class="form-select form-control input-custom  form-select-sm is-rounded"
                aria-label=".form-select-sm is-rounded example" name="type">
                <option selected value="">Tipe</option>
                <option value="embed">Embed</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
            <span class="error-package text-danger d-none"></span>
        </div>
        <div class="mb-1 image" id="image">
            <label for="file" class="form-label">Story</label>
            <input type="file" class="form-control input-custom" aria-label="file" aria-describedby="basic-addon1"
                id="file" name="file" accept="image/*">
            <span class="error-file text-danger d-none"></span>
        </div>
      
        <div class="mb-1 embed" id="embed" style="display: none">
            <label for="embed" class="form-label">Embed</label>
            <input type="text" class="form-control input-custom" placeholder="nW7L0FUNDZw" aria-label="Event Name"
                aria-describedby="basic-addon1" id="embed" name="embed">
            <span class="error-embed text-danger d-none"></span>
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
