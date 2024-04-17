@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
        $img = isset($data['image']) ? $data['image'] : '600x400.png';
    @endphp
    <div class="card payment-card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('assets/img/BANK/' . $img) }}" class="img-fluid rounded-start"
                    alt="Bank Logo {{ $key }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['category'] ?? '' }}</h5>
                    <p class="card-text">{{ $data['norekening'] ?? '' }}</p>
                    <p class="card-text">({{ $data['name'] ?? '' }})</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
