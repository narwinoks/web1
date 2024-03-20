<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">PriceList</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-pricelist">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="key" id="key" value="save-price-list">
        <div class="mb-1">
            <label for="catgeory" class="form-label">Category Price</label>
            <select class="form-select form-select-sm input-custom" id="catgeory" aria-label=".form-select-sm example"
                name="category">
                <option value="" selected>Pilih Category</option>
                @foreach ($types as $type)
                    <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                @endforeach
            </select>
            <span class="error text-category d-none images"></span>
        </div>
        <div class="mb-1">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control input-custom" placeholder="GIFT VOUCHER WORTH 500K"
                aria-label="title" aria-describedby="basic-addon1" id="title" name="title">
            <span class="error-title text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" class="form-control input-custom" placeholder="FREE MAKE UP ARTIST"
                aria-label="subtitle" aria-describedby="basic-addon1" id="subtitle" name="subtitle">
            <span class="error-subtitle text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="description" class="form-label">Description</label>
            <textarea class="tinymce" name="content" rows="6" placeholder="Content.."></textarea>
            <span class="error-content text-danger d-none"></span>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" aria-label="Close"
            class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
        <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
            <div class="spinner-border d-none mx-4" role="status">
            </div>
            <span class="mr-4" id="tag-button"> <i aria-disabled="true" class="fa fa-save"></i>
                Simpan</span>
        </button>
    </div>
</form>
