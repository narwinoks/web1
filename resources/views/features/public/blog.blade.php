@extends('templates.public.main')
@section('title', 'Blog Post')
@section('content')
    <section class="blog-hero">
        <div class="hero">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('assets/img/blog-hero.png') }}" class="blog-hero" alt="blog-hero">
                </div>
                <div class="col-8">
                    <div class="content">
                        <h3 class="h5">HIEROS (ἱερός) <span>is Greek for ”sacred, sanctified”</span></h3>
                        <p>That’s how we see it on every wedding ceremony. It takes several ceremonial before the day in
                            our
                            culture. Engagement, recitation to God – whoever you believes in – every step are sacred. </p>
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
