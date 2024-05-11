@foreach ($images as $key => $image)
    @if ($image->type == 'image')
        <div class="col-md-6 col-lg-4 col-12 mt-2">
            <a href="#">
                <div class="img-gallery">
                    <img src="{{ asset('assets/img/' . $image->url) }}" alt="image-gallery-{{ $key }}"
                        class="img-fluid">
                </div>
            </a>
        </div>
    @elseif ($image->type == 'video')
        <div class="col-md-6 col-lg-4 col-12 mt-2">
            <a href="#">
                <div class="img-gallery">
                    <video controls class="img-fluid rounded">
                        <source src="{{ asset('assets/videos/' . $image->url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </a>
        </div>
    @elseif($image->type == 'embed')
        <div class="col-md-6 col-lg-4 col-12 mt-2">
            <a href="#">
                <div class="img-gallery">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $image->url }}" allowfullscreen></iframe>
                    </div>
                </div>
            </a>
        </div>
    @endif
@endforeach
