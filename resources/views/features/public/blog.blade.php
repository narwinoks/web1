@extends('templates.public.main')
@section('title', 'Blog Post')
@section('content')
    @php
        $banner = \App\Helpers\Helper::getContent('Banner Blog');
        $head = json_decode($banner->content, true);
    @endphp
    <section class="blog-hero">
        <div class="hero">
            <div class="row align-items-center py-md-3 py-5 px-md-0 px-5">
                <div class="col-sm-12 col-md-4" style="
                text-align: center;">
                    <img src="{{ asset('assets/img/' . $banner->image) }}" style="width:150px" class="blog-hero img-fluid"
                        alt="blog-hero">
                </div>
                <div class="col-sm-12 col-md-8 px-4 px-md-0 mt-md-0 mt-5">
                    <div class="content">
                        <h3 class="h5" style="
                        resize: none;
                        box-sizing: border-box;
                        border-style: solid;
                        border-width: 0;
                        outline: 0;
                        line-height: 1.4;
                        text-rendering: optimizeLegibility;font-size:15px" >{!! $head['title'] ?? '' !!}</h3>
                        <p>{!! $head['subtitle'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-category">
        <div class="container text-center">
            <h4 class="h5">Browser by category :</h4>
            <div id="category-image">

            </div>
            <div id="loading-category" class="text-center" style="display: none">
                <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
            </div>
        </div>
    </section>
    <section class="blog">
        <div class="container-fluid">
            <input type="hidden" value="5" name="limit" id="limit">
            <input type="hidden" value="0" name="offseat" id="offset">
            <input type="hidden" value="" name="category" id="category">
            <input type="hidden" value="image" name="key" id="key">
            <h4 class="h6 text-center">OUR LATEST PHOTOWORK</h4>
            <div class="row mt-4" id="content-blog">

            </div>
            <div id="loading-animation" class="text-center" style="display: none">
                <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
            </div>
            <div class="text-center justify-content-center mt-4">
                <button class="button" id="show-more">Perlihatan Lagi</button>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        var timeout;
        loadMoreData();
        loadCategory();
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

        function loadCategory() {
            $("#loading-category").show();
            var key = "category-blog";
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: key,
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-category").hide();
                }, 2000)
                $('#category-image').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
@push('sctyles')
    <style>
        .blog-hero {
            max-width: 200px !important;
            max-height: auto !important;
        }

        .blog-hero .hero img {
            width: 200px !important;
            height: auto;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush
