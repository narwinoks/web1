@foreach ($images as $key => $image)
    @if ($image->type == 'image')
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
                <img src="{{ asset('assets/img/' . $image->url) }}" class="img-fluid rounded" alt="gambar">
                <div class="button-group">
                    <button class="btn btn-danger delete-button-story" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @elseif ($image->type == 'video')
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
                <video controls class="img-fluid rounded">
                    <source src="{{ asset('assets/videos/' . $image->url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="button-group">
                    <button class="btn btn-danger delete-button-story" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @elseif ($image->type == 'embed')
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $image->url }}" allowfullscreen></iframe>
                </div>
                <div class="button-group">
                    <button class="btn btn-danger delete-button-story" data-id="{{ $image->id }}"><i
                            class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
            <div class="image-container position-relative">
            </div>
        </div>
    @endif
@endforeach
