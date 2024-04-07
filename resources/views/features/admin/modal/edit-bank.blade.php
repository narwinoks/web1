<div class="modal-header">
    <h5 class="modal-title h4" id="myLargeModalLabel">BANK ACCOUNT</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
@php
    $bank = json_decode($data->content, true);
@endphp
<form id="form-add-bank">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
    <div class="modal-body">
        <input type="hidden" name="key" id="key" value="bank">
        <div class="mb-1">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select form-select-sm input-custom" id="category" aria-label=".form-select-sm example"
                name="category">
                <option value="" selected>Pilih Kategory</option>
                @foreach ($banks as $key => $b)
                    <option {{ $bank['category'] == $b['value'] ? 'selected' : '' }} data-image="{{ $b['image'] }}"
                        value="{{ $b['value'] }}">
                        {{ $b['label'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1">
            <label for="norekening" class="form-label">No Rekening</label>
            <input type="text" class="form-control input-custom" placeholder="NO REKENING" aria-label="norekening"
                aria-describedby="basic-addon1" id="norekening" value="{{ $bank['norekening'] }}" name="norekening">
            <span class="error-norekening text-danger d-none"></span>
        </div>
        <div class="mb-1">
            <label for="name" class="form-label">Atas Nama</label>
            <input type="text" class="form-control input-custom" placeholder="NAMA" aria-label="name"
                aria-describedby="basic-addon1" id="name" name="name" value="{{ $bank['name'] }}">
            <span class="error-name text-danger d-none"></span>
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
