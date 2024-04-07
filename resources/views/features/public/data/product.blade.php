@foreach ($products as $key => $product)
    @php
        $review = 5;
        $stars_full = floor($review);
        $stars_half = ceil($review - $stars_full);
    @endphp
    <div class="col-xs-12 col-md-6 bootstrap snippets bootdeys">
        <div class="product-content is-rounded product-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="product-image">
                        <img src="{{ asset('assets/img/' . $product->image) }}" alt="194x228"
                            class="img-fluid is-rounded">
                        @if ($product->discount)
                            <span class="tag2 hot">
                                HOT
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-deatil">
                        <h5 class="name">
                            <a href="{{ url('/product/' . $product->slug) }}">
                                {{ $product->name }} <span>Category</span>
                            </a>
                        </h5>
                        <p class="price-container">
                            @if ($product->discount && $product->discount != null)
                                <span class="discount">{{ $product->discount }}</span>
                                <span class="price">{{ $product->price }}</span>
                            @else
                                <span class="price">{{ $product->price }}</span>
                            @endif
                        </p>
                        <span class="tag1"></span>
                    </div>
                    <div class="description">
                        {!! \Illuminate\Support\Str::limit($product->description, 150, $end = '...') !!}
                    </div>
                    <div class="product-info smart-form">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a href="{{ url('/product/' . $product->slug) }}" class="btn btn-success">Detail</a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="rating stars">
                                    <label for="stars-rating-1">
                                        @for ($i = 0; $i < $stars_full; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($stars_half > 0)
                                            <i class="fas fa-star-half"></i>
                                        @endif
                                        @for ($i = 0; $i < 5 - $stars_full - $stars_half; $i++)
                                            <i class="fas fa-star-o"></i>
                                        @endfor
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
