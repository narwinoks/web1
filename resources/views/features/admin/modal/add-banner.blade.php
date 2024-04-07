<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">Banner</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-banner">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="key" id="key" value="banner">
        <div class="mb-1 row justify-content-center text-center">
            <div id="imagePreview" src="{{ asset('assets/img/600x400.png') }}" alt="placeholder image goes here"></div>
            <input id="uploadFile" type="file" name="file" class="img form-control input-custom" />
            <span class="error text-file d-none images"></span>

        </div>
        <div class="mb-1">
            <label for="category" class="form-label">Type</label>
            <select class="form-select form-select-sm input-custom" id="category" aria-label=".form-select-sm example"
                name="category">
                <option value="" selected>Pilih Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                @endforeach
            </select>
            <span class="error text-category d-none images"></span>
        </div>
        <div class="mb-1">
            <label for="title" class="form-label">Title</label>
            <textarea type="text" class="form-control input-custom" placeholder="Enter Your title" aria-label="title"
                aria-describedby="basic-addon1" id="title" name="title"></textarea>
            <span class="error-title text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="answer" class="form-label">Subtitle</label>
            <textarea type="text" class="form-control input-custom" placeholder="Enter Your subtitle" aria-label="subtitle"
                aria-describedby="basic-addon1" id="subtitle" name="subtitle"></textarea>
            <span class="error-subtitle text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="order" class="form-label">Order</label>
            <input type="text" class="form-control input-custom" name="order" id="order">
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
