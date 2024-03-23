@foreach ($images as $key => $image)
    <div class="col-lg-4  col-md-6 col-12">
        <a href="{{ route('gallery', ['slug' => $image->slug]) }}">
            <div class="image-gallery">
                <img src="{{ asset('assets/img/' . $image->url) }}" alt="image-{{ $key }}" class="img-fluid">
            </div>
        </a>
    </div>
@endforeach
