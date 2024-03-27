@foreach ($images as $key => $image)
    <div class="item">
        <img src="{{ asset('assets/img/' . $image->url) }}" alt="image-studio-{{ $key }}"
            class="img-fluid img-gallery">
    </div>
@endforeach
