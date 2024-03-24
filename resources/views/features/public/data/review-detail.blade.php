@foreach ($reviews as $key => $review)
    @php
        $data = json_decode($review->content, true);
        $img = isset($data['file']) ? $data['file'] : '600x400.png';
    @endphp
    <div class="col-12 col-md-8">
        <div class="card card-review">
            <div class="header">
                <img src="{{ asset('assets/img/' . $img) }}" class="img-fluid" alt="image-1">
                <h4 class="h6 fw-normal fst-italic">{{ $data['name'] ?? 'Unknow' }}</h4>
            </div>
            <div class="content mt-2">
                <p>
                    {{ $data['review'] }}
                </p>
            </div>
        </div>
    </div>
@endforeach
