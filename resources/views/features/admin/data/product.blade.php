@foreach ($products as $key => $product)
    <div class="col-lg-4 col-sm-12 col-md-6">
        <div class="card card-product">
            <div class="action-buttons">
                <button type="button" class="btn btn-sm is-rounded btn-danger delete-button-product"
                    data-id="{{ $product->id }}"><i class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-primary edit-button-product" data-id="{{ $product->id }}"><i
                        class="fas fa-edit"></i></button>
            </div>
            <img src="{{ asset('assets/img/' . $product->image) }}" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <div class="row">
                    <div class="col-md-6">
                        Price
                        @if ($product->discount)
                        <span
                            class="amount-old">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                        <span
                            class="pro-price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->discount) }}</span>
                    @else
                        <span
                            class="pro-price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                    @endif
                    </div>
                    <div class="col-md-6">
                        Promo
                        <p class="card-text">
                            {{ \App\Helpers\Helper::convertPriceToShortFormat($product->discount ?? 0) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
