@foreach ($images as $key => $image)
    <div class="col-4">
        <div class="image-preview">
            <img src="{{ asset('assets/img/' . $image->url) }}" alt="{{ asset('images/' . $image->url) }}">
            <div class="image-buttons">
                <button class="btn btn-danger btn-sm remove-image" data-id="{{ $image->id }}"
                    data-image="{{ asset('assets/img/' . $image->url) }}"><i class="fas fa-trash"></i></button>
                <button class="btn btn-success btn-sm add-image" data-id="{{ $image->id }}"
                    data-image="{{ asset('assets/img/' . $image->url) }}"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
@endforeach
