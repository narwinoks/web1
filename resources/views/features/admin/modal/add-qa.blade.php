<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">QA</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-qa">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="key" id="key" value="save-qa">
        <div class="mb-1">
            <label for="question" class="form-label">Question</label>
            <textarea type="text" class="form-control input-custom" placeholder="Enter Your Question" aria-label="question"
                aria-describedby="basic-addon1" id="question" name="question"></textarea>
            <span class="error-question text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="tinymce" name="answer" id="answer" rows="2" placeholder="Content.."></textarea>
            <span class="error-content text-danger d-none"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" aria-label="Close"
            class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
        <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
            <div class="spinner-border d-none mx-4" role="status">
            </div>
            <span class="mr-4" id="tag-button"> <i aria-disabled="true" class="fas fa-save"></i>
                Simpan</span>
        </button>
    </div>
</form>
