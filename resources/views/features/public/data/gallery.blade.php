@foreach ($images as $key => $image)
    <div class="col-md-6 col-lg-4 col-12 mt-2">
        <a href="{{ route('gallery', ['slug' => $image->slug]) }}">
            <div class="img-gallery">
                <img src="{{ asset('assets/img/' . $image->url) }}" alt="image-gallery-{{ $key }}"
                    class="image-fluid">
            </div>
        </a>
    </div>
@endforeach
