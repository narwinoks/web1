<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">Upload Image</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<form id="form-add-image">
    @csrf
    <input type="hidden" name="id" id="id-edit-image" value="{{ $image->id }}">
    <input type="hidden" name="image_old" id="image_old" value="{{ $image->url }}">
    <div class="modal-body">
        <input type="hidden" value="save-image" name="key" id="key">
        <div class="mb-1" id="thumbnail">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" class="form-control input-custom" aria-label="thumbnail"
                aria-describedby="basic-addon1" id="thumbnail" name="thumbnail" accept="image/*">
            <span class="error-thumbnail text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="category" class="form-label">Kategori {{ $image->category }}</label>
            <select class="form-select form-select-sm input-custom" id="category" aria-label=".form-select-sm example"
                name="category">
                <option value="">Pilih Kategory</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->name }}" {{ $image->category == $category->name ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" class="form-control input-custom" placeholder="Event Name" aria-label="Event Name"
                aria-describedby="basic-addon1" id="name" name="name" value="{{ $image->name }}">
            <span class="error-name text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="type" class="form-label">Tipe Gallery</label>
            <select class="form-select form-select-sm input-custom" id="type" aria-label=".form-select-sm example"
                name="type">
                <option value="" selected>Pilih Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type['value'] }}">{{ $type['label'] }}</option>
                @endforeach
            </select>
            <span class="error text-category d-none images"></span>
        </div>
        <div class="mb-1" id="embed">
            <label for="embed" class="form-label">Embed Youtube</label>
            <input type="text" class="form-control input-custom" placeholder="rU2Ip6EksrI" aria-label="embed"
                aria-describedby="basic-addon1" id="embed" name="embed">
        </div>
        <div class="mb-1" id="video" style="display: none">
            <label for="video" class="form-label">Video</label>
            <input type="file" class="form-control input-custom" placeholder="rU2Ip6EksrI" aria-label="video"
                aria-describedby="basic-addon1" id="video" name="video" accept="video/*">
        </div>
        <div class="mt-5" id="image" style="display: none">
            <label class="form-label mb-4" for="images">Upload image</label>
            <br>
            <label>*ukuran maks 5MB, lebar maks: 5000px, tinggi maks: 5000px, per gambar </label>
            <div class="input-images"></div>
            <br>
            <span class="error text-danger d-none images"></span>
        </div>
        <div class="mb-5 row" id="data-edit">

        </div>
        <div id="loading" class="text-center">
            <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm close-modal-add-image btn-secondary">Close</button>
        <button type="submit" id="button" class="btn btn-sm btn-primary is-rounded">
            <div class="spinner-border d-none mx-4" role="status">
            </div>
            <span class="mr-4" id="tag-button"> <i aria-disabled="true" class="fa fa-save"></i>
                Simpan</span>
        </button>
    </div>
</form>
<script>
    $('.input-images').imageUploader();
</script>
