@extends('templates.public.main')
@section('title', 'FAQ')
@section('content')
    <section class="faq">
        <div class="hero">
            <img src="{{ asset('assets/img/' . \App\Helpers\Helper::getBanner('Banner Faq')) }}" alt="image-studio"
                class="img-fluid">
        </div>
        <div class="mt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-5 px-3 px-md-0 col-12">
                    <div class="row" id="qa-content">

                    </div>
                    <div id="loading-animation-qa" class="text-center" style="display: none">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        loadDataQA()

        function loadDataQA() {
            $("#loading-animation-qa").show();
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                data: {
                    key: 'qa',
                },
            }).done(function(data) {
                $('#qa-content').append(data);
                $("#loading-animation-qa").hide();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            });
        }
    </script>
@endpush
@push('styles')
    <style>
        .faq .hero  {
            padding: 10px 5px;
        }
    </style>
@endpush
