@extends('templates.public.main')
@section('title', 'Engagement Gallery')
@section('content')
    <section class="hero-wedding">
        <div class="content">
            <img src="{{ asset('assets/img/engagement-1.png') }}" class="img-fluid" alt="thumnail-engagement">
        </div>
    </section>
    <section class="blog">
        <div class="container-fluid">
            <input type="hidden" value="5" name="limit" id="limit">
            <input type="hidden" value="0" name="offseat" id="offset">
            <input type="hidden" value="engagement" name="category" id="category">
            <input type="hidden" value="image" name="key" id="key">
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
