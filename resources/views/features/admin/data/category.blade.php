@foreach ($images as $key => $image)
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
                <img src="{{ asset('assets/img/' . $image->image) }}" class="img-fluid rounded" alt="gambar">
                <div class="button-group">
                    <button class="btn btn-primary edit-button" data-id="{{ $image->id }}"><i
                            class="fas fa-edit"></i></button>
                    <button class="btn btn-danger delete-button" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
@endforeach
