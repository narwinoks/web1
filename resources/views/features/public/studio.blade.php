@extends('templates.public.main')
@section('title', 'Studio Session')
@section('content')
    <section class="studio-hero">
        <div class="hero">
            <img src="{{ asset('assets/img/banner-studio.webp') }}" alt="image-studio" class="image-fluid">
            <div class="overlay"></div>
        </div>
    </section>
    <section class="studio-hero-info">
        <div class="container text-center justify-content-center">
            <p class="p">
                Here is our latest offer to bring more emotional bond to your portrait. <br>
                <span class="fw-bold">
                    Shutterbox Short studio session is now available.
                </span> <br />
            </p>
            <p>
                Scroll to see more portfolios of our studio session. <br />
            </p>
            <p>
                Book now & save more
            </p>
        </div>
    </section>
    <section class="image-studio">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="owl-carousel owl-carousel-stduio owl-theme">
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-2.jpg') }}" alt="image-studio-2"
                                class="img-fluid img-gallery">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-3.jpg') }}" alt="image-studio-3"
                                class="img-fluid img-gallery">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-5">
                    <div class="owl-carousel owl-carousel-stduio owl-theme">
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-3.jpg') }}" alt="image-studio-3"
                                class="img-fluid img-gallery">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-3.jpg') }}" alt="image-studio-3"
                                class="img-fluid img-gallery">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center  text-center">
                <div class="col-12 mt-4">
                    <p>Here are some of the properties we have</p>
                </div>
                <div class="justify-content-center  text-center col-md-6 col-12">
                    <div class="owl-carousel owl-carousel-stduio-2 owl-theme">
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-4.jpg') }}" alt="image-studio-3"
                                class="img-fluid img-gallery">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/studio-image-3.jpg') }}" alt="image-studio-3"
                                class="img-fluid img-gallery">
                        </div>
                    </div>
                    <div class="nav-left"></div>
                    <div class="nav-right"></div>
                </div>
            </div>
            <div class="row">
                <img src="{{ asset('assets/img/studio-image-5.jpg') }}" alt="image-price" class="img-fluid">
            </div>

        </div>
        {{-- <div class="container-md">
            <div class="row studio mt-5 text-center justify-content-center">
                <div class="image-acc">
                    <img src="{{ asset('assets/img/studio-image-7.jpg') }}" alt="image-acc" class="img-fluid">
                    <div class="title">
                        <h4 class="h4">STUDIO</h4>
                        <h4 class="h4">PREWEDDING</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('assets/img/studio-image-8.jpg') }}" class="img-fluid image-preweding"
                            alt="image-preweding">
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <section class="price">
        <div class="container-fluid">
            <div class="title text-center mt-5">
                <h4 class="h4">STUDIO</h4>
                <h4 class="h6">PREWEDDING</h4>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 col-lg-4">
                        <div class="pricing-item">
                            <h3 class="pricing-kit">1.5 HOUR PREWEDDING</h3>
                            <p class="pricing">IDR 2</p>
                            <ul class="offers">
                                <li>1 Photographer</li>
                                <li>1.5 Workhour & include Shutterbox' studio facility</li>
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
    <section class="address">
        <div class="container justify-content-center text-center">
            <lord-icon src="https://cdn.lordicon.com/iikoxwld.json" trigger="loop" state="loop-roll"
                style="width:150px;height:150px">
            </lord-icon>
            <div class="content">
                <p>
                    Studio Location:
                </p>
                <p class="fw-bold">
                    Komplek Mulya Golf Residence No. A7, Pakemitan, Cinambo, Bandung City (45474)
                </p>
            </div>
            <div class="content mt-3">
                <p>TnC:</p>
                <p class="fw-bold">only available on weekday 8am-4pm</p>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="{{ asset('assets/plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel-stduio').owlCarousel({
            margin: 20,
            loop: true,
            dots: true,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 2000,
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
        $('.owl-carousel-stduio-2').owlCarousel({
            margin: 20,
            loop: true,
            nav: true,
            dots: false,
            autoHeight: true,
            autoplay: true,
            navText: [$('.nav-left'), $('.nav-right')],
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
