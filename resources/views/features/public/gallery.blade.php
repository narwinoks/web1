@extends('templates.public.main')
@section('title', $title)
@section('content')
    <section class="">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <h5 class="h5 py-4 fst-italic fw-bolder">Gallery {{ $title }}</h5>
                </div>
            </div>
            <div class="row justify-content-center text-center" id="gallery-content">
            </div>
            <div class="row justify-content-center text-center">
                <div id="loading-animation" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        loadData();

        function loadData() {
            $("#loading-animation").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    key: 'gallery',
                    slug: '{{ $slug }}'
                },
            }).done(function(data) {

                $('#limit').val(3);
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                $('#gallery-content').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
    </script>
@endpush
