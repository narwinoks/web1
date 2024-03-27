@extends('templates.public.main')
@section('title', 'Studio Session')
@section('content')
    <section class="studio-hero">
        <div class="hero">
            <img src="{{ asset('assets/img/' . \App\Helpers\Helper::getBanner('Banner Studio')) }}" alt="image-studio"
                class="image-fluid">
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
                <div id="loading-animation" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                </div>
                <div class="col-md-6 col-12">
                    <div class="owl-carousel owl-carousel-stduio owl-theme" id="img-content-1">

                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-5">
                    <div class="owl-carousel owl-carousel-stduio owl-theme" id="img-content-2">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center  text-center">
                <div class="col-12 mt-4">
                    <p>Here are some of the properties we have</p>
                </div>
                <div class="justify-content-center  text-center col-md-6 col-12">
                    <div class="owl-carousel owl-carousel-stduio-2 owl-theme" id="img-content-3">

                    </div>
                    <div class="nav-left"></div>
                    <div class="nav-right"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="price">
        <div class="container-fluid">
            <div class="title text-center mt-5">
                <h4 class="h4">STUDIO</h4>
                <h4 class="h6">PREWEDDING</h4>
            </div>
            <div class="container">
                <div class="row mt-5" id="content-price-list">

                </div>
                <div id="loading-animation-pl" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
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
                    {{ \App\Helpers\Helper::getProfile('address') }}
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
        loadDataPriceList();

        function loadDataPriceList() {
            $("#loading-animation-pl").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'pricelist',
                    category: 'Studio'
                },
            }).done(function(data) {
                $('#content-price-list').append(data);
                $("#loading-animation-pl").hide();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            });
        }

        function load() {
            img1()
            img2()
            img3()
        }

        function img1() {
            getImage('asc', '#img-content-1')
        }

        function img2() {
            getImage('desc', '#img-content-2')
        }

        function img3() {
            getImage2()
        }
        load();

        function getImage(order, section) {
            $("#loading-animation").show();
            var key = "studio";
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: key,
                    order: order
                },
            }).done(function(data) {
                console.log(section);
                $(section).append(data);
                setTimeout(function() {
                    $("#loading-animation").hide();
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
                }, 2000)
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }

        function getImage2() {
            $("#loading-animation").show();
            var key = "studio";
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: key,
                },
            }).done(function(data) {
                $('#img-content-3').append(data);
                setTimeout(function() {
                    $("#loading-animation").hide();
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
                }, 2000)
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
