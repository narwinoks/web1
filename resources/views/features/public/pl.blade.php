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
                    <div class="row" id="content-img">
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
                    <span class="fw-normal">For your support and apprecciation so far, Shutterbox is offering you </span>
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
                <div id="loading-animation-pl" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                </div>
                <div class="row" id="pricelist">
                </div>
            </div>
        </div>
    </section>
    <section class="review">
        <div class="container-fluid px-3 px-md-5">
            <div class="row justify-content-center">
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
    <section class="form-pricelist">
        <div class="container justify-content-center text-center">
            <h2 class="h4 fw-bolder fst-italic">PRICELIST</h2>
        </div>
        <div class="container-fluid justify-content-center py-4 px-5">
            <div class="text-center">
                <p class="h7">
                    <span>After fill the form below</span><br>
                    <span class="fw-bolder">Go check your email</span> <span>(inbox/promotion/updates) to see Shutterbox'
                        pricelist.</span>
                </p>
                <p class="h7 mx-0 px-0 py-0 my-0">
                    <span>Claim 5% off (up to Rp 1.500.000,-) for your first order.</span>
                </p>
            </div>
            <div class="content mt-4">
                <form id="form-pl">
                    @csrf
                    <input type="hidden" value="save-pl" name="key" id="key">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="name" class="form-control-sm is-rounded form-control" id="name"
                                        placeholder="Dimas Setiawan" name="name">
                                    <span class="error-name text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="package" class="form-label">Package</label>
                                    <select id="package" class="form-select form-select-sm is-rounded"
                                        aria-label=".form-select-sm is-rounded example" name="package">
                                        <option selected value="">Pakcage</option>
                                        <option value="prewedd">Bundling (Prewedd & Wedding)</option>
                                        <option value="prewedding">Prewedding</option>
                                        <option value="weeding">Weeding</option>
                                        <option value="engagement">Engagement</option>
                                        <option value="maternity">Maternity / family</option>
                                        <option value="other">Others</option>
                                    </select>
                                    <span class="error-package text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="location" class="form-label">Event location</label>
                                    <select id="location" class="form-select form-select-sm is-rounded"
                                        aria-label=".form-select-sm is-rounded example" name="location">
                                        <option value="bandung">Bandung</option>
                                        <option value="jakarta">Jakarta</option>
                                        <option value="etc">Etc</option>
                                    </select>
                                    <span class="error-location text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="find" class="form-label">How do you find Shutterbox? </label>
                                    <select id="find" class="form-select form-select-sm is-rounded"
                                        aria-label=".form-select-sm is-rounded example" name="find">
                                        <option value="friend">Instagram</option>
                                        <option value="prewedd">Friend/Family</option>
                                        <option value="prewedding">Pinterest</option>
                                        <option value="weeding">Bridestory</option>
                                        <option value="engagement">Google</option>
                                        <option value="maternity">TikTok</option>
                                        <option value="other">YouTube</option>
                                    </select>
                                    <span class="error-find text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="brand" class="form-label">What is your consideration when choosing a
                                        wedding photographer? </label>
                                    <select id="brand" class="form-select form-select-sm is-rounded"
                                        aria-label=".form-select-sm is-rounded example" name="brand">
                                        <option value="brand">Brand image</option>
                                        <option value="recommendation">Recommendation</option>
                                        <option value="cheap">Cheap</option>
                                        <option value="photo">Photo quality</option>
                                        <option value="feature">Feature (qty of edited files, album, printed photos)
                                        </option>
                                        <option value="promotion">Promotion</option>
                                        <option value="negotiation">Negotiation</option>
                                    </select>
                                    <span class="error-brand text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="estimed" class="form-label">Estimated date & venue for your event
                                    </label>
                                    <textarea  id="estimed" class="form-control is-rounded" rows="2"
                                        placeholder="Ex: 31 Nov 2024 at Sampoerna Strategic, Jakarta." name="estimed"></textarea>
                                    <span class="error-estimed text-danger d-none"></span>
                                </div>
                                <div class="mb-1">
                                    <label for="why" class="form-label">Why Shutterbox? What do you expect from us?
                                    </label>
                                    <input type="text" class="form-control-sm is-rounded form-control" id="why"
                                        placeholder="..." name="why">
                                    <span class="error-why text-danger d-none"></span>
                                </div>
                                <div class="mb-1 mt-4">
                                    <div class="row px-3">
                                        <button type="submit" id="button" class="btn btn-purple is-rounded">
                                            <div class="spinner-border d-none mx-4" role="status">
                                            </div>
                                            <span class="mr-4" id="tag-button"> <i aria-disabled="true"
                                                    class="fa fa-check-square-o"></i> Get The
                                                Pricelist</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <input type="hidden" value="" name="category" id="category">
    <input type="hidden" value="image-pricelist" name="keyImg" id="keyImg">
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/owlcarousel/css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/main/alert.js') }}"></script>
    <script src="{{ asset('assets/js/main/validation.js') }}"></script>
    <script src="{{ asset('assets/plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script>
        loadDataImg();
        loadDataReview();
        loadDataPriceList();

        function loadDataImg() {
            $("#loading-animation-img").show();
            var offset = 0;
            var limit = 6;
            var keyImg = $('#keyImg').val().replace(/\s+/g, '');
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    offset: $('#offset').val(),
                    limit: $('#limit').val(),
                    key: keyImg,
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-animation-img").hide();
                }, 2000)
                $('#content-img').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }

        function loadDataPriceList() {
            $("#loading-animation-pl").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'pricelist',
                },
            }).done(function(data) {
                $('#pricelist').append(data);
                $("#loading-animation-pl").hide();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            });
        }

        function loadDataReview() {
            $("#loading-animation-pl").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'review',
                },
            }).done(function(data) {
                $('#review-content').append(data);
                setTimeout(function() {
                    $("#loading-animation-pl").hide();
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
        $('#form-pl').submit(function(event) {
            $(this).prop('disabled', false);
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).find('#tag-button').addClass('d-none');
            event.preventDefault();
            var form = document.getElementById('form-pl');
            var formData = new FormData(form);
            $.ajax({
                url: '{{ route('save') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showAlert(response.message, 'success')
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
