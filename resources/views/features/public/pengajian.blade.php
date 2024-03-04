@extends('templates.public.main')
@section('title', 'Pengajian dan Siraman Gallery')
@section('content')
    <section class="hero-wedding">
        <div class="content">
            <img src="{{ asset('assets/img/pengajian-1.png') }}" class="img-fluid" alt="thumnail-weedding">
        </div>
    </section>
    <section class="blog">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/image-blog-1.webp') }}" alt="image-gallery-2" class="image-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <div class="ratio ratio-4x3">
                            <iframe src="https://www.youtube.com/embed/R2Vi-5louxI?rel=0" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/image-blog-1.webp') }}" alt="image-gallery-2" class="image-fluid">
                    </div>
                </div>
            </div>
            <div class="text-center justify-content-center mt-4">
                <button class="button">Perlihatan Lagi</button>
            </div>
        </div>
    </section>
@endsection
