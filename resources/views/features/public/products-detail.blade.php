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
                                            href="#">Jackets</a>For Photographers.</span>
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
                                    <input type="quantiy" placeholder="1" class="form-control quantity">
                                </div>
                                <p class="mt-2">
                                    <button class="btn btn-round btn-black" type="button"><i
                                            class="fa fa-shopping-cart"></i>
                                        Add
                                        to Cart</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
