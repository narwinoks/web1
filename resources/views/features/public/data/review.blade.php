@foreach ($reviews as $key => $review)
    @php
        $data = json_decode($review->content, true);
        $img = isset($data['file']) ? $data['file'] : '600x400.png';
        $review = $data['rating'] ?? 5;
        $stars_full = floor($review);
        $stars_half = ceil($review - $stars_full);
    @endphp
    <div class="item">
        <div class="card">
            <div class="review">
                <div class="user-profile">
                    <img src="{{ asset('assets/img/' . $img) }}" alt="user-profile">
                </div>
                <div class="content">
                    <div class="stars">
                        @for ($i = 0; $i < $stars_full; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @if ($stars_half > 0)
                            <i class="fas fa-star-half"></i>
                        @endif
                        @for ($i = 0; $i < 5 - $stars_full - $stars_half; $i++)
                            <i class="fas fa-star-o"></i>
                        @endfor
                    </div>

                    <div class="name">
                        {{ $data['name'] ?? '' }}
                    </div>
                    <div class="name-sub">
                        {{ $reviews[$key]->created_at ?? '' }}
                    </div>
                    <div class="text">
                        {!! $data['review'] ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
