@extends('templates.public.main')
@section('content')
    <section class="hero">
        <div class="owl-carousel owl-carousel-1 owl-theme">
            <div class="item">
                <img src="{{ asset('assets/img/hero1.png') }}" alt="hero">
                <div class="overlay"></div>
            </div>
            <div class="item">
                <img src="{{ asset('assets/img/hero1.png') }}" alt="hero-2">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="nav-left"></div>
        <div class="nav-right"></div>
    </section>
    <section class="info">
        <div class="container text-center">
            <h3 class="bold h5">Hieros means 'sacred' in Greek</h3>
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
                <p class="p py-0 my-0">featured</p>
                <h3 class="h6">BLOG POSTS</h3>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/image-photo1.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/image-photo1.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-12">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/image-photo1.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="/" class="btn btn-black is-rounded">View All PortFolio</a>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="image">
            <img src="{{ asset('assets/img/imag-contact.png') }}" alt="image-contact">
            <div class="overlay"></div>
            <div class="content">
                <h3>Let's connect</h3>
                <a href="#" class="button"><i class="fa fa-check-circle" aria-disabled="true"></i> Access
                    pricelist</a>
            </div>
        </div>
    </section>
    <section class="memories">
        <div class="container-fluid px-3 px-md-5 ">
            <h3 class="light h5">TOMORROW'S MEMORIES, TODAY.</h3>
            <div class="row mt-5">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="image-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-1" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="review">
        <div class="container-fluid px-3 px-md-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="content text-end">
                        <h2 class="light h3">Review</h2>
                        <p class="p">
                            Here's the review based on our lovely customers' experience with Hieros. <br />
                            Hopefully, this might help you choose the right photographer on your special day!
                        </p>
                    </div>
                    <div class="image">
                        <img src="{{ asset('assets/img/review.png') }}" alt="image-review">
                    </div>
                </div>
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
