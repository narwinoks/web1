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
                    <div class="col-md-12 price-container">
                        Price
                        @if ($product->discount)
                            <span
                                class="discount">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                            <span
                                class="price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->discount) }}</span>
                        @else
                            <span
                                class="price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        .price-container .discount {
            color: rgb(244, 81, 30);
            text-decoration: line-through;
            font-size: 16px;
        }

        .price-container .price {
            color: var(--black);
            font-family: Lato, sans-serif;
            font-size: 16px;
            line-height: 20px;
        }
    </style>
@endforeach
