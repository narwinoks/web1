@foreach ($images as $key => $image)
    @if ($image->type == 'Image')
        <div class="col-auto mt-2">
            <div class="gallery">
                <img src="{{ asset('assets/img/' . $image->url) }}" class="img-fluid" alt="image-1">
            </div>
        </div>
    @elseif ($image->type == 'Embed Youtube')
        <div class="col-12 mt-3">
            <div class="gallery text-center mt-2">
                <div class="ratio ratio-16x9 is-rounded" style="max-width: 500px; margin: 0 auto;">
                    <iframe src="https://www.youtube.com/embed/{{ $image->url }}" title="YouTube video" allowfullscreen
                        class="is-rounded"></iframe>
                    <div class="overlay is-rounded"></div>
                </div>
            </div>
        </div>
    @endif
@endforeach
