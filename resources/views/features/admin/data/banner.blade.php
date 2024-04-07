@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-4 col-sm-6 col-lg-4 mt-3">
        <div class="image-container position-relative">
            @if (isset($data['file']) && file_exists(public_path('assets/img/' . $data['file'])))
                <img src="{{ asset('assets/img/' . $data['file']) }}" class="img-fluid" alt="image-1">
            @else
                <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="Default Image">
            @endif
            <div class="button-group">
                <button class="btn btn-primary edit-button edit-button-banner" data-id="{{ $content->id }}"><i
                        class="fas fa-edit"></i></button>
                <button class="btn btn-danger delete-button delete-button-banner" data-id="{{ $content->id }}"><i
                        class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
@endforeach
