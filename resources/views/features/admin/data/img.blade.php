@foreach ($images as $key => $image)
    @if ($image->type == 'Image')
        <div class="col-md-4">
            <div class="image-container position-relative">
                <img src="{{ asset('assets/img/' . $image->url) }}" class="img-fluid rounded" alt="gambar">
                <div class="button-group">
                    <button class="btn btn-danger delete-button-image" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @elseif ($image->type == 'Video')
    @else
        <div class="col-md-4">
            <div class="image-container position-relative">
                <div class="ratio ratio-4x3">
                    <iframe src="https://www.youtube.com/embed/.{{ $image->url }}" title="YouTube video"
                        allowfullscreen></iframe>
                </div>
                <div class="button-group">
                    <button class="btn btn-danger delete-button-image" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @endif
@endforeach
