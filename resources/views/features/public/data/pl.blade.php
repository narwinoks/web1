@foreach ($contents as $key => $content)
    @php
        $data = json_decode($content->content, true);
    @endphp
    <div class="col-md-6 col-12 col-lg-4">
        <div class="pricingTable pink">
            <h3 class="title">{{ $data['title'] ?? '' }}</h3>
            <div class="price-value">
                <span class="currency">Rp</span>
                <span class="amount">{{ $data['subtitle'] ?? '' }}</span>
            </div>
            {!! $data['content'] ?? '' !!}
            <a href="#" class="pricingTable-signup">Order Now</a>
        </div>
    </div>
@endforeach
