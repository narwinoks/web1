@extends('templates.public.main')
@section('content')
    <section class="hero">
        <div class="owl-carousel owl-carousel-1 owl-theme">
            @foreach ($banners as $key => $banner)
                @php
                    $data = json_decode($banner->content, true);
                    $img = isset($data['file']) ? $data['file'] : '600x400.png';
                @endphp
                <div class="item">
                    <img src="{{ asset('assets/img/' . $img) }}" alt="hero">
                    <div class="overlay"></div>
                </div>
            @endforeach
        </div>
        <div class="nav-left"></div>
        <div class="nav-right"></div>
    </section>
    <section class="info">
        <div class="container text-center">
            <h3 class="bold h5">Shutterbox means 'sacred' in Greek</h3>
            <div class="content text-center">
                <p class="p">
                    We're established to immortalize the most sanctified of yours <br />
                    What if God's primary intent for your relationship isn't to make you happy, but holy? <br />
                </p>
                <p class="p">
                    What if your relationship isn't as much about you and your partner as it is about you and God? <br />
                </p>
                <p class="p">
                    Starting with the discovery that the goal of a relationship foes beyond personal happiness <br />
                    We invite you to see how God can use marriage as dicipline and a motivation to love God more and reflect
                    <br />
                    more of the character of his creation.
                </p>
            </div>
        </div>
    </section>
    <section class="blogs">
        <div class="container-fluid px-3 px-md-5">
            <div class="text-center text-orange">
                <p class="h6 py-0 my-0">featured</p>
                <h3 class="h5">BLOG POSTS</h3>
            </div>
            <div class="row mt-3" id="portfolio">
            </div>
            <div class="text-center">
                <a href="{{ url('blog') }}" class="btn btn-black is-rounded">View All PortFolio</a>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="image">
            <img src="{{ asset('assets/img/imag-contact.png') }}" alt="image-contact">
            <div class="overlay"></div>
            <div class="content">
                <h3>Let's connect</h3>
                <a href="{{ url('pl') }}" class="button"><i class="fa fa-check-circle" aria-disabled="true"></i> Access
                    pricelist</a>
            </div>
        </div>
    </section>
    {{-- <section class="memories">
        <div class="container-fluid px-3 px-md-5 ">
            <h3 class="light h5">TOMORROW'S MEMORIES, TODAY.</h3>
            <div class="row mt-5" id="catgeory-featured">
            </div>
        </div>
        <div id="loading-category" class="text-center" style="display: none">
            <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
        </div>
    </section> --}}
    <section class="review">
        <div class="container-fluid px-3 px-md-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="content text-end">
                        <h2 class="light h3">Review</h2>
                        <p class="p">
                            Here's the review based on our lovely customers' experience with Shutterbox. <br />
                            Hopefully, this might help you choose the right photographer on your special day!
                        </p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('assets/img/review.png') }}" alt="image-review">
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-5 mb-5">
                    <div id="loading-animation-review" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                    <div class="items">
                        <div class="owl-carousel owl-theme owl-carousel-2" id="review-content">
                        </div>
                        <img src="{{ asset('assets/img/background-review.png') }}" alt="background-review"
                            class="background-image">
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="portfolio" name="portfolio" id="portfolio_key">
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel-1').owlCarousel({
            margin: 20,
            nav: true,
            loop: true,
            navText: [$('.nav-left'), $('.nav-right')],
            dots: false,
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
    </script>
    <script>
        loadData();
        loadDataReview();
        // loadDataCategory();

        function loadData() {
            $("#loading-animation").show();
            var key = $('#portfolio_key').val().replace(/\s+/g, '');
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: key,
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                $('#portfolio').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }

        function loadDataReview() {
            $("#loading-animation-review").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'review',
                },
            }).done(function(data) {
                $('#review-content').append(data);
                setTimeout(function() {
                    $("#loading-animation-review").hide();
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
                    });
                }, 2000);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            });
        }

        function loadDataCategory() {
            $("#loading-category").show();
            var key = "category-blog";
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    home: true,
                    key: key,
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-category").hide();
                }, 2000)
                $('#catgeory-featured').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
