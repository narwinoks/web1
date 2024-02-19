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
            <div class="row text-center justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="category mb-3">
                        <img src="{{ asset('assets/img/wedding.webp') }}" alt="category-1" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="category mb-3">
                        <img src="{{ asset('assets/img/wedding.webp') }}" alt="category-1" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog">
        <div class="container-fluid">
            <h4 class="h6 text-center">OUR LATEST PHOTOWORK</h4>
            <div class="row mt-4">
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/600x400.png') }}" alt="image-gallery-1" class="image-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="img-gallery">
                        <img src="{{ asset('assets/img/image-blog-1.webp') }}" alt="image-gallery-2" class="image-fluid">
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
