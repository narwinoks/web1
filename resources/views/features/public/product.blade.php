@if(!$is_include)
@extends('templates.public.main')
@section('title', 'For Photographers')
@section('content')
@endif
    <section class="products">
        <div class="container">
            <div class="row mt-4">
                <div class="text-center">
                    <h3 class="h3 fst-italic">PRODUCTS</h3>
                    <p class="h7">
                        <span>Dapatkan akses eksklusif ke <span class="fw-bold">pengetahuan dan pengalaman 9 tahun</span>
                            shutterbox.photography
                            di industri Fotografi
                            Pernikahan. </span><br />
                    </p>
                    <p class="h7">
                        <span>Kami tidak hanya memberikan formula yang terbukti efektif, tetapi juga memberikan wawasan
                            mendalam
                            yang akan membantu Anda mengambil </span><br />
                        <span>langkah tepat dalam mengembangkan bisnis dan meningkatkan kualitas karya fotografi
                            Anda.</span>
                    </p>
                    <p class="h7">
                        <span><span class="fw-bold">Klik produk digital di bawah</span> ini dan jelajahi pengetahuan baru
                            yang
                            penuh dengan keindahan dan
                            misteri. </span>
                    </p>
                </div>
                <div id="content">

                </div>
                <div id="loading-animation" class="text-center" style="display: none">
                    <img src="{{ asset('assets/img/loading.gif') }}" width="30px">
                </div>
                <div class="text-center justify-content-center mt-4">
                    <button class="button btn-show" id="show-more">Perlihatan Lagi</button>
                </div>
            </div>
        </div>
    </section>
    @if(!$is_include)
        @endsection
    @endif
@push('scripts')
    <script>
        function loadMoreData() {
            $('#content').empty()
            $("#loading-animation").show();
            var key = 'products';
            $.ajax({
                url: "{{ route('content') }}",
                type: 'GET',
                async: false,
                data: {
                    search: $('#search').val(),
                    key: key
                },
            }).done(function(data) {
                setTimeout(function() {
                    $("#loading-animation").hide();
                }, 2000)
                $('#content').append(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error: " + textStatus, errorThrown);
            })
        }
        loadMoreData();
    </script>
@endpush
