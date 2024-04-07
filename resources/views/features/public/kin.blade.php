@extends('templates.public.main')
@section('title', 'Shutterbox (Family Portraiture)')
@section('content')
    <section class="hero d-none d-md-block">
        <img src="{{ asset('assets/img/hero-kin.png') }}" class="img-fluid" alt="hero-kin">
    </section>
    <section class="blog">
        <div class="container-fluid">
            <input type="hidden" value="5" name="limit" id="limit">
            <input type="hidden" value="0" name="offseat" id="offset">
            <input type="hidden" value="kin" name="category" id="category">
            <input type="hidden" value="image" name="key" id="key">
            <div class="row mt-4" id="content-blog">

            </div>
            <div class="text-center justify-content-center mt-4">
                <button class="button" id="show-more">Perlihatan Lagi</button>
            </div>
        </div>
    </section>
    <section class="form-price">
        <div class="container justify-content-center text-center">
            <h2>Pricelist</h2>
            <p>After filling out the form below, you can access Shutterbox Pricelist.pdf </p>
            <p>Our team will contact you as soon as possible</p>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="mb-1">
                                <label for="name" class="form-label">Name</label>
                                <input type="email" class="form-control-sm form-control" id="name"
                                    placeholder="Dimas Family">
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control-sm form-control" id="email" placeholder="..">
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">How do you know Shutterbox?</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>How do you know Shutterbox</option>
                                    <option value="google">Google</option>
                                    <option value="friend">Friend</option>
                                    <option value="ig">IG / FB Ads</option>
                                    <option value="family">Family</option>
                                    <option value="social">Social Media</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Estimated location</label>
                                <input type="email" class="form-control-sm form-control" id="email"
                                    placeholder="Home / Studio / Air BnB / Hotel / Etc...">
                            </div>
                            <div class="mb-5">
                                <label for="email" class="form-label">Why choose Shutterbox Photography?</label>
                                <input type="email" class="form-control-sm form-control" id="email" placeholder="...">
                            </div>
                            <div class="mb-1">
                                <div class="row px-3">
                                    <button class="btn btn-purple"><span class="mr-4"> <i aria-disabled="true"
                                                class="far fa-check-circlecle-square-o"></i></span>
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
@push('scripts')
    <script>
        var timeout;
        loadMoreData();
        $('#show-more').on('click', function() {
            loadMoreData();
        });

        function loadMoreData() {
            $("#loading-animation").show();
            var offset = parseInt($('#offset').val());
            var limit = parseInt($('#limit').val());
            var category = $('#category').val().replace(/\s+/g, '');
            var key = $('#key').val().replace(/\s+/g, '');
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    offset: $('#offset').val(),
                    limit: $('#limit').val(),
                    startDate: $('#startDate').val(),
                    endDate: $('#endDate').val(),
                    key: key,
                    category: category
                },
            }).done(function(data) {
                if (offset == 0) {
                    offset = offset + 5;

                } else {
                    offset = offset + 5;
                }
                $('#offset').val(offset);
                $('#limit').val(3);
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                $('#content-blog').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
