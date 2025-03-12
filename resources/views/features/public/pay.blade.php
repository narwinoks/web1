@extends('templates.public.main')
@section('content')
    <section class="form-pay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="product-item">
                        <img src="{{ asset('assets/img/'. ($product->image ??'600x400.png')) }}" alt="Product Image" class="product-image">
                        <div class="product-details">
                            <h6>{{ $product->name }}</h6>
                            <p class="desc">{!! Str::limit($product->description, 60) !!}</p>
                            <div class="info">
                                @if ($product->discount)
                                    <span
                                        class="amount-old pro-price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                                    <span
                                        class="price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->discount) }}</span>
                                @else
                                    <span
                                        class="price">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</span>
                                @endif
                                <p class="quantity">Jumlah: {{ $qunatity }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <p>Selesaikan Order !</p>
                        <div class="col-12">
                            <form id="form-order">
                                @csrf
                                <input type="hidden" name="key" value="order" id="key">
                                <div class="form mt-5">
                                    <div class="mb-1">
                                        <label for="name" class="form-label">Name </label>
                                        <input type="text" class="form-control-sm form-control" id="name"
                                            name="name" placeholder="..">
                                        <span class="error-name text-danger d-none"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" class="form-control-sm form-control" id="email"
                                            name="email" placeholder="..">
                                        <span class="error-email text-danger d-none"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label for="whatsapp" class="form-label">Whatsapp </label>
                                        <input type="text" class="form-control-sm form-control" id="whatsapp"
                                            name="whatsapp" placeholder="..">
                                        <span class="error-whatsapp text-danger d-none"></span>
                                    </div>
                                    <div class="mb-1">
                                        <label for="city" class="form-label">city </label>
                                        <input type="text" class="form-control-sm form-control" id="city"
                                            name="city" placeholder="..">
                                    </div>
                                    <div class="mb-1 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreement1" value="true"
                                                id="agreement1">
                                            <label class="form-check-label" for="agreement1">
                                                Product akan dikirim via email & wa (pastikan data di atas sudah benar)
                                            </label>
                                            <span class="error-agreement1 text-danger d-none"></span>
                                        </div>
                                    </div>
                                    <div class="mb-1 mt-2">
                                        <label for="city" class="form-label">Metode Pemabayaran </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreement2" value="true"
                                                id="agreement2" checked>
                                            <label class="form-check-label" for="agreement2">
                                                Bank Transfer
                                            </label>
                                            <span class="error-agreement2 text-danger d-none"></span>
                                        </div>
                                    </div>
                                    <div class="mb-1 noted">
                                        <label for="note" class="form-label">Catatan </label>
                                        <textarea name="note" class="form-control-sm form-control" placeholder="Tambahkan catatan kamu disini!..."
                                            id="note" rows="2"></textarea>
                                    </div>
                                    <div class="mb-1 mt-4">
                                        <div class="row px-3">
                                            <button type="submit" id="button" class="btn btn-purple is-rounded">
                                                <div class="spinner-border d-none mx-4" role="status">
                                                </div>
                                                <span class="mr-4" id="tag-button"> <i aria-disabled="true"
                                                        class="far fa-check-circlecle-square-o"></i>
                                                    Order
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .form-pay {
            background: var(--abu);
        }

        .product-item {
            width: 100%;
            margin: 0px 10px;
            background: var(--white);
            border: 1px solid #ccc;
            padding: 10px;
            box-sizing: border-box;
            overflow: hidden;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .product-image {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
            border-radius: 10px;
        }

        .product-details {
            flex-grow: 1;
            text-align: left;
        }

        .product-details .info {
            display: flex;
            justify-content: space-between;
        }

        .product-details h3 {
            margin: 0;
            font-size: 18px;
        }

        .product-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .product-details .desc {
            overflow: hidden;
            text-overflow: ellipsis;
            width: 200px;
            white-space: nowrap;
        }

        .price {
            font-weight: 400;
            color: #fc5959;
        }

        .form p {
            text-align: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 600;
        }

        .btn-warning {
            font-weight: 400;
            color: var(--white) !important;
            background-color: var(--black);
            border-color: var(--black);
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $('#form-order').submit(function(event) {
            $(this).prop('disabled', false);
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).find('#tag-button').addClass('d-none');
            event.preventDefault();
            var form = document.getElementById('form-order');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('saveForm') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success');
                    setTimeout(() => {
                        window.location.href = response.data.redirect;
                    }, 2000);
                },
                error: function(error) {
                    if (error.status == 400 || error.status == 422) {
                        printErrorMsg(error);
                    } else {
                        showAlert(error.responseJSON.message || 'Error', 'danger')
                    }
                },
                complete: function(data) {
                    $('#button').find('.spinner-border').addClass('d-none');
                    $('#button').find('#tag-button').removeClass('d-none');
                }
            });
        });
    </script>
@endpush
