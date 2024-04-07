@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-12">
        <div class="card card-review">
            <div class="action-buttons">
                <button class="btn btn-sm is-rounded  btn-primary edit-button-review" data-id="{{ $content->id }}"><i
                        class="fas fa-edit"></i></button>
                <button class="btn  btn-sm is-rounded btn-danger delete-button-review" data-id="{{ $content->id }}"><i
                        class="fas fa-trash"></i></button>
            </div>
            <div class="header">
                @if (isset($data['file']) && file_exists(public_path('assets/img/' . $data['file'])))
                    <img src="{{ asset('assets/img/' . $data['file']) }}" class="img-fluid" alt="image-1">
                @else
                    <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="Default Image">
                @endif
                <h4 class="h6 fw-normal fst-italic">{{ $data['name'] ?? '' }}</h4>
            </div>
            <div class="content mt-2">
                <p>
                    {{ $data['review'] ?? '' }}
                </p>
            </div>
        </div>
    </div>
@endforeach
