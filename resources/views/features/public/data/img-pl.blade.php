@foreach ($images as $key => $image)
    <div class="col-lg-4 col-md-6 mt-md-0 mt-2 col-12">
        <a href="{{ route('gallery', ['slug' => $image->slug]) }}">
            <div class="img-gallery">
                <img src="{{ asset('assets/img/' . $image->url) }}" class="img-fluid" alt="image-{{ $key }}">
            </div>
        </a>
    </div>
@endforeach
