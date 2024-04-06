@extends('templates.public.main')
@section('title', 'product Detail 1')
@section('content')
    <div class="container bootdey">
        @php
            $tags = explode(',', $product->tag);
        @endphp
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">
                            <div class="col-md-6">
                                <div class="pro-img-details">
                                    <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="img-fluid is-rounded">
                                </div>
                                <div class="pro-img-list">
                                    <div class="row">
                                        @foreach ($product->images as $key => $img)
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <a href="#">
                                                    <img src="{{ asset('assets/img/' . $img->url) }}" alt="image"
                                                        class="img-fluid is-rounded">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="pro-d-title">
                                    <a href="#" class="">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                {!! $product->description !!}
                                <div class="product_meta">
                                    <span class="posted_in"> <strong>Categories:</strong> <a rel="tag"
                                            href="#">For Photographers.</a></span>
                                    <span class="tagged_as"><strong>Tags:</strong>
                                        @foreach ($tags as $key => $tag)
                                            <a rel="tag" href="#">{{ $tag }}</a>,
                                        @endforeach
                                    </span>
                                </div>
                                <div class="m-bot15"> <strong>Price : </strong>
                                    @if ($product->discount)
                                        <span class="amount-old">{{ $product->price }}</span>
                                        <span class="pro-price">{{ $product->discount }}</span>
                                    @else
                                        <span class="amount-old">{{ $product->price }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" id="quantity" placeholder="1"
                                        class="form-control quantity">
                                    <span class="error-quantity text-danger d-none"></span>
                                </div>
                                <p class="mt-2">
                                    <a href="{{ url('/pay') }}" class="btn btn-round btn-black" type="button"><i
                                            class="fa fa-shopping-cart"></i>
                                        Beli
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            $(".btn-black").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('saveForm') }}",
                    data: {
                        key: "pay-product",
                        quantity: $("#quantity").val(),
                        productId: $("#product_id").val(),
                        _token: $("#token").val()
                    },
                    success: function(data) {

                    },
                    error: function(error) {
                        if (error.status == 400 || error.status == 422) {
                            printErrorMsg(error);
                        } else {
                            showAlert(error.responseJSON.message || 'Error', 'danger')
                        }
                    },
                });
            });
        });
    </script>
@endpush
