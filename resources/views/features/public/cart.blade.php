@extends('templates.public.main')
@section('title', 'Order Pay')
@section('content')
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Items in your cart</h5>
                            <span>(<strong>{{ $qty }}</strong>) items</span>
                        </div>
                        <div class="ibox-content is-rounded">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>
                                        <tr>
                                            <td width="90">
                                                <div class="cart-product-imitation">
                                                </div>
                                            </td>
                                            <td class="desc">
                                                <h3>
                                                    <a href="#" class="text-navy text-decoration-none">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <p class="small">
                                                    {!! $product->description !!}
                                                </p>
                                            </td>

                                            <td>
                                                <h3 class="h5">
                                                    @if ($product->discount)
                                                        {{ \App\Helpers\Helper::convertPriceToShortFormat($product->discount) }}
                                                        <small
                                                            class="small text-muted">{{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}</small>
                                                    @else
                                                        {{ \App\Helpers\Helper::convertPriceToShortFormat($product->price) }}
                                                    @endif
                                                </h3>
                                            </td>
                                            <td width="65">
                                                <input type="text" class="form-control" placeholder="1"
                                                    value="{{ $qty }}" readonly>
                                            </td>
                                            <td>
                                                <h5 class="h5">
                                                    {{ \App\Helpers\Helper::convertPriceToShortFormat($qty * ($product->price - $product->discount)) }}
                                                </h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="ibox-content">
                            <a href="{{ $redirectUrl }}" class="btn btn-black pull-right"><i
                                    class="fas fa-shopping-cart"></i>
                                Konfirmasi Pembayaran</a>
                            <button class="btn btn-white"><i class="fas fa-arrow-left"></i> Kembali</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold h5">
                                {{ \App\Helpers\Helper::convertPriceToShortFormat($qty * ($product->price - $product->discount)) }}
                            </h2>
                            <hr>
                        </div>
                    </div>
                    <div class="content-bank" id="content-bank">

                    </div>
                    <div id="loading-animation-bank" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        loadBank();

        function loadBank() {
            $("#loading-animation-bank").show();
            var key = 'bank';
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: key
                },
            }).done(function(data) {
                $('#content-bank').empty();
                $('#content-bank').append(data);
                $("#loading-animation-bank").hide();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
