@extends('templates.public.main')
@php
    $title = 'PL Form ' . date('Y');
@endphp
@section('title', $title)
@section('content')
    <section class="pl">
        <div class="container-md">
            <div class="row justify-content-center text-center">
                <div class="col-md-9 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mt-md-0 mt-2 col-12">
                            <div class="img-gallery">
                                <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="image-1">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-md-0 mt-2 col-12">
                            <div class="img-gallery">
                                <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="image-1">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-md-0 mt-2 col-12">
                            <div class="img-gallery">
                                <img src="{{ asset('assets/img/600x400.png') }}" class="img-fluid" alt="image-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="question">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h4 class="h6 fw-bolder fst-italic">Dear Creatures,</h4>
                <p class="h7">
                    <span class="fw-normal">For your support and apprecciation so far, Hieros is offering you </span>
                    <span class="fw-bolder">special offer up to IDR 1.500.000,- </span>
                </p>
                <p class="h7">
                    <span>
                        This promotion is valid when you download/screenshot the voucher and send it to our admin before
                        making
                        a down payment.
                    </span>
                </p>
                <p class="h7">
                    <span>
                        (TnC Applied)
                    </span>
                </p>
            </div>
        </div>
    </section>
    <section class="price">
        <div class="container-fluid">
            <div class="title text-center mt-5 mb-5">
                <h4 class="h4">PRICELIST</h4>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 col-lg-4">
                        <div class="pricing-item">
                            <h3 class="pricing-kit">GIFT VOUCHER WORTH 500k</h3>
                            <p class="pricing">IDR 2</p>
                            <ul class="offers">
                                <li>1 Photographer</li>
                                <li>1.5 Workhour & include Hieros' studio facility</li>
                                <li>15 Edited photo</li>
                                <li>Print 1pc 16Rp w/ minimalist frame</li>
                                <li>Max 1 outfit</li>
                                <li>All edited & JPG files via Google Drive</li>
                            </ul>
                            <button class="order-btn">order now</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 col-lg-4">
                        <div class="pricing-item">
                            <h3 class="pricing-kit">GIFT VOUCHER 300K</h3>
                            <p class="pricing">FOR STUDIO SESSION</p>
                            <ul class="offers">
                                <li>1 Photographer</li>
                                <li>1.5 Workhour & include Hieros' studio facility</li>
                                <li>15 Edited photo</li>
                                <li>Print 1pc 16Rp w/ minimalist frame</li>
                                <li>Max 1 outfit</li>
                                <li>All edited & JPG files via Google Drive</li>
                            </ul>
                            <button class="order-btn">order now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="review">
        <div class="container-fluid px-3 px-md-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12 mt-5 mb-5">
                    <div class="items">
                        <div class="owl-carousel owl-theme owl-carousel-2">
                            <div class="item">
                                <div class="card">
                                    <div class="review">
                                        <div class="user-profile">
                                            <img src="{{ asset('assets/img/600x400.png') }}" alt="user-profile">
                                        </div>
                                        <div class="content">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                            <div class="name">
                                                John Doe
                                            </div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="review">
                                        <div class="user-profile">
                                            <img src="{{ asset('assets/img/600x400.png') }}" alt="user-profile">
                                        </div>
                                        <div class="content">
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                            <div class="name">
                                                John Doe
                                            </div>
                                            <div class="text">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                                                metus quis metus fermentum congue.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/img/background-review.png') }}" alt="background-review"
                            class="background-image">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-pricelist">
        <div class="container justify-content-center text-center">
            <h2 class="h4 fw-bolder fst-italic">PRICELIST</h2>
        </div>
        <div class="container-fluid justify-content-center py-4 px-5">
            <div class="text-center">
                <p class="h7">
                    <span>After fill the form below</span><br>
                    <span class="fw-bolder">Go check your email</span> <span>(inbox/promotion/updates) to see Hieros'
                        pricelist.</span>
                </p>
                <p class="h7 mx-0 px-0 py-0 my-0">
                    <span>Claim 5% off (up to Rp 1.500.000,-) for your first order.</span>
                </p>
            </div>
            <div class="content mt-4">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control-sm is-rounded form-control" id="name"
                                    placeholder="Dimas Setiawan">
                            </div>
                            <div class="mb-1">
                                <label for="package" class="form-label">Package</label>
                                <select id="package" class="form-select form-select-sm is-rounded"
                                    aria-label=".form-select-sm is-rounded example">
                                    <option selected value="">Pakcage</option>
                                    <option value="prewedd">Bundling (Prewedd & Wedding)</option>
                                    <option value="prewedding">Prewedding</option>
                                    <option value="weeding">Weeding</option>
                                    <option value="engagement">Engagement</option>
                                    <option value="maternity">Maternity / family</option>
                                    <option value="other">Others</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="package" class="form-label">Event location</label>
                                <select id="package" class="form-select form-select-sm is-rounded"
                                    aria-label=".form-select-sm is-rounded example">
                                    <option value="bandung">Bandung</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="etc">Etc</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="package" class="form-label">How do you find Hieros? </label>
                                <select id="package" class="form-select form-select-sm is-rounded"
                                    aria-label=".form-select-sm is-rounded example">
                                    <option value="friend">Instagram</option>
                                    <option value="prewedd">Friend/Family</option>
                                    <option value="prewedding">Pinterest</option>
                                    <option value="weeding">Bridestory</option>
                                    <option value="engagement">Google</option>
                                    <option value="maternity">TikTok</option>
                                    <option value="other">YouTube</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="package" class="form-label">What is your consideration when choosing a
                                    wedding photographer? </label>
                                <select id="package" class="form-select form-select-sm is-rounded"
                                    aria-label=".form-select-sm is-rounded example">
                                    <option value="brand">Brand image</option>
                                    <option value="recommendation">Recommendation</option>
                                    <option value="cheap">Cheap</option>
                                    <option value="photo">Photo quality</option>
                                    <option value="feature">Feature (qty of edited files, album, printed photos)
                                    </option>
                                    <option value="promotion">Promotion</option>
                                    <option value="negotiation">Negotiation</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="package" class="form-label">Estimated date & venue for your event </label>
                                <textarea name="estimated" id="estimated" class="form-control is-rounded" rows="2"
                                    placeholder="Ex: 31 Nov 2024 at Sampoerna Strategic, Jakarta."></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="why" class="form-label">Why Hieros? What do you expect from us? </label>
                                <input type="why" class="form-control-sm is-rounded form-control" id="name"
                                    placeholder="...">
                            </div>
                            <div class="mb-1 mt-4">
                                <div class="row px-3">
                                    <button class="btn btn-purple is-rounded"><span class="mr-4"> <i
                                                aria-disabled="true" class="fa fa-check-square-o"></i></span>
                                        Get The
                                        Pricelist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel-2').owlCarousel({
            margin: 20,
            loop: true,
            dots: false,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        })
    </script>
@endpush