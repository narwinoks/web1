@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-6 col-12 col-lg-4">
        <div class="pricing-item is-rounded">
            <h3 class="pricing-kit">{{ $data['subtitle'] ?? '' }}</h3>
            <p class="pricing">{{ $data['title'] ?? '' }}</p>
            <ul class="offers">
                {!! $data['content'] ?? '' !!}
            </ul>
            <button class="order-btn">order now</button>
        </div>
    </div>
@endforeach
