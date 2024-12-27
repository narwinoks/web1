@extends('templates.public.main')
@section('title', 'Review Page')
@section('content')
    <section class="review">
        <div class="container">
            <div class="text-center">
                <h3 class="h3 fst-italic">Review</h3>
                <p class="h7">
                    <span>Here's the review based on our lovely customers' experience with Shutterbox. </span><br />
                    <span>Hopefully this might help you to choose the right photographer on your special day! </span>
                </p>
            </div>
            <div class="row justify-content-center mt-4" id="review-content">
            </div>
            <div class="row justify-content-center mt-4" id="review-content">
                <div id="loading-animation-review" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                </div>
                <div class="text-center justify-content-center mt-4">
                    <button class="btn-show" id="show-more">Perlihatan Lagi</button>
                </div>
                <div class="text-center justify-content-center mt-4">
                    <a href="{{ url('form-review') }}" class="btn btn-black" id="show-more">Add Book Review</a>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="0" id="offset" name="offset">
    <input type="hidden" value="20" id="limit" name="limit">
@endsection
@push('scripts')
    <script>
        loadDataReview()
        $('#show-more').on('click', function() {
            loadDataReview();
        });

        function loadDataReview() {
            $("#loading-animation-review").show();
            var offset = parseInt($('#offset').val());
            var limit = parseInt($('#limit').val());
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'review',
                    offset: $('#offset').val(),
                    limit: $('#limit').val(),
                    detail: true
                },
            }).done(function(data) {
                $('#review-content').append(data);
                $("#loading-animation-review").hide();
                offset = offset + 10;
                $('#offset').val(offset);
                $('#limit').val(10);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            });
        }
    </script>
@endpush
