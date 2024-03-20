@foreach ($images as $key => $image)
    @if ($image->type == 'Image')
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
                <img src="{{ asset('assets/img/' . $image->url) }}" class="img-fluid rounded" alt="gambar">
                <div class="button-group">
                    <button class="btn btn-primary edit-button" data-id="{{ $image->id }}"><i
                            class="fa fa-edit"></i></button>
                    <button class="btn btn-danger delete-button" data-id="{{ $image->id }}"><i
                            class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    @elseif ($image->type == 'Video')
    @else
    @endif
@endforeach
